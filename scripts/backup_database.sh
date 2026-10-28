#!/bin/bash

# Aadamya POS - Database Backup Script
# This script creates automatic backups of the Aadamya POS database
# Schedule with cron for automatic daily backups
#
# Cron example (daily at 2 AM):
# 0 2 * * * /var/scripts/backup_aadamya_pos.sh

# Configuration
DB_USER="aadamya_user"
DB_PASSWORD="your_password_here"  # Use environment variable in production
DB_NAME="aadamya_pos"
DB_HOST="localhost"
BACKUP_DIR="/backups/aadamya_pos"
RETENTION_DAYS=30
COMPRESSION_LEVEL=9
LOG_FILE="/var/log/aadamya_pos_backup.log"

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Function to log messages
log_message() {
    local level=$1
    local message=$2
    local timestamp=$(date '+%Y-%m-%d %H:%M:%S')
    echo "[$timestamp] [$level] $message" | tee -a "$LOG_FILE"
}

# Function to cleanup old backups
cleanup_old_backups() {
    log_message "INFO" "Cleaning up backups older than $RETENTION_DAYS days..."
    find "$BACKUP_DIR" -type f -name "*.sql.gz" -mtime +$RETENTION_DAYS -delete
    log_message "INFO" "Cleanup completed"
}

# Function to send notification
send_notification() {
    local status=$1
    local message=$2
    local email="admin@aadamya.com"
    
    # Uncomment to enable email notifications
    # echo "$message" | mail -s "Aadamya POS Database Backup - $status" "$email"
}

# Main backup function
perform_backup() {
    log_message "INFO" "Starting database backup for $DB_NAME"

    # Create backup directory if it doesn't exist
    if [ ! -d "$BACKUP_DIR" ]; then
        mkdir -p "$BACKUP_DIR"
        if [ $? -ne 0 ]; then
            log_message "ERROR" "Failed to create backup directory: $BACKUP_DIR"
            send_notification "FAILED" "Failed to create backup directory"
            exit 1
        fi
    fi

    # Generate backup filename with timestamp
    TIMESTAMP=$(date +%Y%m%d_%H%M%S)
    BACKUP_FILE="$BACKUP_DIR/aadamya_pos_${TIMESTAMP}.sql"
    BACKUP_FILE_GZ="$BACKUP_FILE.gz"

    # Perform backup
    log_message "INFO" "Creating database dump..."
    
    mysqldump --user="$DB_USER" --password="$DB_PASSWORD" \
              --host="$DB_HOST" \
              --single-transaction \
              --quick \
              --lock-tables=false \
              --routines \
              --triggers \
              "$DB_NAME" > "$BACKUP_FILE"

    if [ $? -ne 0 ]; then
        log_message "ERROR" "Database dump failed"
        send_notification "FAILED" "Database backup failed. Check logs for details."
        rm -f "$BACKUP_FILE"
        exit 1
    fi

    log_message "INFO" "Compressing backup..."
    
    # Compress backup
    gzip -$COMPRESSION_LEVEL "$BACKUP_FILE"

    if [ $? -ne 0 ]; then
        log_message "ERROR" "Compression failed"
        send_notification "FAILED" "Backup compression failed"
        rm -f "$BACKUP_FILE"
        exit 1
    fi

    # Verify compressed file
    if [ -f "$BACKUP_FILE_GZ" ]; then
        FILE_SIZE=$(du -h "$BACKUP_FILE_GZ" | cut -f1)
        log_message "INFO" "Backup completed successfully: $BACKUP_FILE_GZ ($FILE_SIZE)"
        
        # Log statistics
        echo "Database: $DB_NAME" >> "$LOG_FILE"
        echo "File Size: $FILE_SIZE" >> "$LOG_FILE"
        echo "Location: $BACKUP_FILE_GZ" >> "$LOG_FILE"
        
        send_notification "SUCCESS" "Database backup completed successfully\nSize: $FILE_SIZE\nLocation: $BACKUP_FILE_GZ"
    else
        log_message "ERROR" "Backup file not found after compression"
        send_notification "FAILED" "Backup verification failed"
        exit 1
    fi
}

# Main execution
main() {
    log_message "INFO" "=========================================="
    log_message "INFO" "Aadamya POS Database Backup Script"
    log_message "INFO" "=========================================="
    
    # Check if mysqldump is installed
    if ! command -v mysqldump &> /dev/null; then
        log_message "ERROR" "mysqldump is not installed"
        exit 1
    fi

    # Perform backup
    perform_backup

    # Cleanup old backups
    cleanup_old_backups

    log_message "INFO" "=========================================="
    log_message "INFO" "Backup process completed"
    log_message "INFO" "=========================================="
}

# Run main function
main
