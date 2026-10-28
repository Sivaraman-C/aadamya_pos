#!/bin/bash

# Aadamya POS - Database Restore Script
# Use this script to restore database from a backup file
# 
# Usage: ./restore_database.sh <backup_file>
# Example: ./restore_database.sh aadamya_pos_20250901_120000.sql.gz

# Configuration
DB_USER="aadamya_user"
DB_PASSWORD="your_password_here"  # Use environment variable in production
DB_NAME="aadamya_pos"
DB_HOST="localhost"
BACKUP_DIR="/backups/aadamya_pos"
LOG_FILE="/var/log/aadamya_pos_restore.log"

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

# Function to log messages
log_message() {
    local level=$1
    local message=$2
    local timestamp=$(date '+%Y-%m-%d %H:%M:%S')
    echo -e "${timestamp} [$level] $message" | tee -a "$LOG_FILE"
}

# Function to show usage
show_usage() {
    echo "Usage: $0 <backup_file>"
    echo ""
    echo "Examples:"
    echo "  $0 aadamya_pos_20250901_120000.sql.gz"
    echo "  $0 /backups/aadamya_pos/aadamya_pos_20250901_120000.sql"
    echo ""
    echo "Available backups:"
    if [ -d "$BACKUP_DIR" ]; then
        ls -lh "$BACKUP_DIR" | tail -n +2 | awk '{print "  " $9 " (" $5 ")"}'
    else
        echo "  No backups found"
    fi
}

# Function to verify backup file
verify_backup_file() {
    local backup_file=$1

    if [ ! -f "$backup_file" ]; then
        log_message "ERROR" "Backup file not found: $backup_file"
        return 1
    fi

    log_message "INFO" "Backup file verified: $backup_file"
    return 0
}

# Function to create pre-restore backup
create_pre_restore_backup() {
    log_message "INFO" "Creating backup before restore..."
    
    local pre_restore_file="$BACKUP_DIR/aadamya_pos_pre_restore_$(date +%Y%m%d_%H%M%S).sql.gz"
    
    mysqldump --user="$DB_USER" --password="$DB_PASSWORD" \
              --host="$DB_HOST" \
              "$DB_NAME" | gzip > "$pre_restore_file"

    if [ $? -eq 0 ]; then
        log_message "INFO" "Pre-restore backup created: $pre_restore_file"
        return 0
    else
        log_message "ERROR" "Failed to create pre-restore backup"
        return 1
    fi
}

# Main restore function
perform_restore() {
    local backup_file=$1

    log_message "INFO" "=========================================="
    log_message "INFO" "Aadamya POS Database Restore Script"
    log_message "INFO" "=========================================="
    log_message "INFO" "Starting restore process..."

    # Verify backup file exists
    if ! verify_backup_file "$backup_file"; then
        return 1
    fi

    # Get file info
    local file_size=$(du -h "$backup_file" | cut -f1)
    log_message "INFO" "Backup file size: $file_size"

    # Create pre-restore backup
    if ! create_pre_restore_backup; then
        log_message "WARNING" "Pre-restore backup failed, continuing anyway..."
    fi

    # Check if file is gzipped
    if [[ "$backup_file" == *.gz ]]; then
        log_message "INFO" "Extracting gzipped backup..."
        local temp_file="/tmp/aadamya_pos_restore_$$.sql"
        
        gunzip -c "$backup_file" > "$temp_file"
        if [ $? -ne 0 ]; then
            log_message "ERROR" "Failed to extract gzipped backup"
            return 1
        fi
        backup_file="$temp_file"
    fi

    # Prompt for confirmation
    echo -e "${YELLOW}WARNING: This will overwrite the current database!${NC}"
    echo -e "${YELLOW}Database: $DB_NAME${NC}"
    echo -e "${YELLOW}Are you sure you want to proceed? (yes/no)${NC}"
    read -r confirmation

    if [ "$confirmation" != "yes" ]; then
        log_message "INFO" "Restore cancelled by user"
        if [[ "$backup_file" == /tmp/* ]]; then
            rm -f "$backup_file"
        fi
        return 0
    fi

    # Perform restore
    log_message "INFO" "Restoring database..."
    
    mysql --user="$DB_USER" --password="$DB_PASSWORD" \
          --host="$DB_HOST" \
          "$DB_NAME" < "$backup_file"

    if [ $? -eq 0 ]; then
        log_message "INFO" "Database restored successfully"
        echo -e "${GREEN}Restore completed successfully!${NC}"
        
        # Clean up temporary file
        if [[ "$backup_file" == /tmp/* ]]; then
            rm -f "$backup_file"
        fi
        
        return 0
    else
        log_message "ERROR" "Database restore failed"
        echo -e "${RED}Restore failed! Check logs for details.${NC}"
        
        # Clean up temporary file
        if [[ "$backup_file" == /tmp/* ]]; then
            rm -f "$backup_file"
        fi
        
        return 1
    fi
}

# Main execution
main() {
    if [ $# -eq 0 ]; then
        show_usage
        exit 1
    fi

    local backup_file=$1

    # If backup file doesn't contain path, check backup directory
    if [[ "$backup_file" != /* ]]; then
        if [ -f "$BACKUP_DIR/$backup_file" ]; then
            backup_file="$BACKUP_DIR/$backup_file"
        fi
    fi

    perform_restore "$backup_file"
}

# Run main function
main "$@"
