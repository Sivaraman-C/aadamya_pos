/*
Author       : Dreamguys
Template Name: POS - Bootstrap Admin Template
*/


$(document).ready(function(){

	// Variables declarations
	var $wrapper = $('.main-wrapper');
	var $slimScrolls = $('.slimscroll');
	var $pageWrapper = $('.page-wrapper');
	feather.replace();

	// Page Content Height Resize
	$(window).resize(function () {
		if ($('.page-wrapper').length > 0) {
			var height = $(window).height();
			$(".page-wrapper").css("min-height", height);
		}
	});

	// Mobile menu sidebar overlay
	$('body').append('<div class="sidebar-overlay"></div>');


	$(document).on('click', '#mobile_btn', function() {
		$wrapper.toggleClass('slide-nav');
		$('.sidebar-overlay').toggleClass('opened');
		$('html').addClass('menu-opened');
		$('#task_window').removeClass('opened');
		return false;
	});

	$(".sidebar-overlay").on("click", function () {
		$('html').removeClass('menu-opened');
		$(this).removeClass('opened');
		$wrapper.removeClass('slide-nav');
		$('.sidebar-overlay').removeClass('opened');
		$('#task_window').removeClass('opened');
	});

	// Logo Hide Btn

	$(document).on("click",".hideset",function () {
		$(this).parent().parent().parent().hide();
	});

	$(document).on("click",".delete-set",function () {
		$(this).parent().parent().hide();
	});

	// Stick Sidebar

	if ($(window).width() > 767) {
		if ($('.theiaStickySidebar').length > 0) {
			$('.theiaStickySidebar').theiaStickySidebar({
				// Settings
				additionalMarginTop: 30
			});
		}
	}

	// Owl Carousel
	if($('.product-slide').length > 0 ){
		$('.product-slide').owlCarousel({
			items: 1,
			margin: 30,
			dots : false,
			nav: true,
			loop: false,
			responsiveClass:true,
			responsive: {
				0: {
					items: 1
				},
				800 : {
					items: 1
				},
				1170: {
					items: 1
				}
			}
		});
	}

	//Notes Slider
	if ($('.notes-slider').length > 0) {
		$('.notes-slider').owlCarousel({
			loop: true,
			margin: 24,
			dots: false,
			nav: true,
			smartSpeed: 2000,
			navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
			responsive: {
				0: {
					items: 1
				},
				768: {
					items: 2
				},
				1300: {
					items: 3
				}
			}
		})
	}

	// Table Responsive
	setTimeout(function () {
		$(document).ready(function () {
			$('.table').parent().addClass('table-responsive');
		});
	}, 1000);

	// Datatable
	if($('.datatable').length > 0) {
		$('.datatable').DataTable({
			"bFilter": true,
			"sDom": 'fBtlpi',  
			"ordering": true,
			"language": {
				search: ' ',
				sLengthMenu: '_MENU_',
				searchPlaceholder: "Search",
				sLengthMenu: 'Row Per Page _MENU_ Entries',
				info: "_START_ - _END_ of _TOTAL_ items",
				paginate: {
					next: ' <i class=" fa fa-angle-right"></i>',
					previous: '<i class="fa fa-angle-left"></i> '
				},
			 },
			initComplete: (settings, json)=>{
				$('.dataTables_filter').appendTo('#tableSearch');
				$('.dataTables_filter').appendTo('.search-input');

			},	
		});
	}

	// image file upload image
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
	
			reader.onload = function (e) {
				$('#blah').attr('src', e.target.result);
			}
	
			reader.readAsDataURL(input.files[0]);
		}
	}
	
	$("#imgInp").change(function(){
		readURL(this);
	});

	// Loader
	setTimeout(function () {
		$('#global-loader');
		setTimeout(function () {
			$("#global-loader").fadeOut("slow");
		}, 100);
	}, 500);


	// Datetimepicker
	if($('.datetimepicker').length > 0 ){
		$('.datetimepicker').datetimepicker({
			format: 'DD-MM-YYYY',
			icons: {
				up: "fas fa-angle-up",
				down: "fas fa-angle-down",
				next: 'fas fa-angle-right',
				previous: 'fas fa-angle-left'
			}
		});
	}
	
	// toggle-password
	if($('.toggle-password').length > 0) {
		$(document).on('click', '.toggle-password', function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $(".pass-input");
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	}
	if($('.toggle-passwords').length > 0) {
		$(document).on('click', '.toggle-passwords', function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $(".pass-inputs");
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	}
	if($('.toggle-passworda').length > 0) {
		$(document).on('click', '.toggle-passworda', function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $(".pass-inputa");
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {setTimeout
				input.attr("type", "password");
			}
		});
	}

	// Settings Toggle Password
	if($('.toggle-password').length > 0) {
		$(document).on('click', '.toggle-password', function() {
			$(this).toggleClass("ti-eye ti-eye-off");
			var input = $(".settings-pass-input");
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	}
	if($('.toggle-passwords').length > 0) {
		$(document).on('click', '.toggle-passwords', function() {
			$(this).toggleClass("ti-eye ti-eye-off");
			var input = $(".settings-pass-inputs");
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});
	}
	if($('.toggle-passworda').length > 0) {
		$(document).on('click', '.toggle-passworda', function() {
			$(this).toggleClass("ti-eye ti-eye-off");
			var input = $(".settings-pass-inputa");
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {setTimeout
				input.attr("type", "password");
			}
		});
	}
	
	// Coming Soon
	if($('.comming-soon-pg').length > 0) {
		// Get html elements
		let day = document.querySelector('.days');
		let hour = document.querySelector('.hours');
		let minute = document.querySelector('.minutes');
		let second = document.querySelector('.seconds');

		function setCountdown() {

		// Set countdown date
		let countdownDate = new Date('oct 2, 2025 16:00:00').getTime();

		// Update countdown every second
		let updateCount = setInterval(function(){

			// Get today's date and time
			let todayDate = new Date().getTime();

			// Get distance between now and countdown date
			let distance = countdownDate - todayDate;

			let days = Math.floor(distance / (1000 * 60 * 60 *24));

			let hours = Math.floor(distance % (1000 * 60 * 60 *24) / (1000 * 60 *60));

			let minutes = Math.floor(distance % (1000 * 60 * 60 ) / (1000 * 60));

			let seconds = Math.floor(distance % (1000 * 60) / 1000);

			// Display values in html elements
			day.textContent = days;
			hour.textContent = hours;
			minute.textContent = minutes;
			second.textContent = seconds;

			// if countdown expires
			if(distance < 0){
				clearInterval(updateCount);
				document.querySelector(".comming-soon-pg").innerHTML = '<h1>EXPIRED</h1>'
			}
		}, 1000)
		}

		setCountdown()
	}

	// Select 2
	if ($('.select').length > 0) {
		$('.select').select2({
			minimumResultsForSearch: -1,
			width: '100%'
		});
	}

	// Counter 
	if($('.counter').length > 0) {
		$('.counter').counterUp({
			delay: 20,
			time: 2000
		});
	}

	if($('#timer-countdown').length > 0) {
		$( '#timer-countdown' ).countdown( {
			from: 180, // 3 minutes (3*60)
			to: 0, // stop at zero
			movingUnit: 1000, // 1000 for 1 second increment/decrements
			timerEnd: undefined,
			outputPattern: '$day Day $hour : $minute : $second',
			autostart: true
		});
	}
	
	if($('#timer-countup').length > 0) {
		$( '#timer-countup' ).countdown( {
			from: 0,
			to: 180 
		});
	}
	
	if($('#timer-countinbetween').length > 0) {
		$( '#timer-countinbetween' ).countdown( {
			from: 30,
			to: 20 
		});
	}
	
	if($('#timer-countercallback').length > 0) {
		$( '#timer-countercallback' ).countdown( {
			from: 10,
			to: 0,
			timerEnd: function() {
				this.css( { 'text-decoration':'line-through' } ).animate( { 'opacity':.5 }, 500 );
			} 
		});
	}
	
	if($('#timer-outputpattern').length > 0) {
		$( '#timer-outputpattern' ).countdown( {
			outputPattern: '$day Days $hour Hour $minute Min $second Sec..',
			from: 60 * 60 * 24 * 3
		});
	}

	// Summernote

	if($('#summernote').length > 0) {
		$('#summernote').summernote({
		height: 300,                 // set editor height
		minHeight: null,             // set minimum height of editor
		maxHeight: null,             // set maximum height of editor
		focus: false                 // set focus to editable area after initializing summernote
		});
	}
	
	// Summernote

	if($('#summernote2').length > 0) {
		$('#summernote2').summernote({
		height: 300,                 // set editor height
		minHeight: null,             // set minimum height of editor
		maxHeight: null,             // set maximum height of editor
		focus: true                  // set focus to editable area after initializing summernote
		});
	}

	if($('#summernote3').length > 0) {
		$('#summernote3').summernote({
		placeholder: 'Type your message',
		height: 300,                 // set editor height
		minHeight: null,             // set minimum height of editor
		maxHeight: null,             // set maximum height of editor
		focus: true                  // set focus to editable area after initializing summernote
		});
	}
	if($('#summernote4').length > 0) {
		$('#summernote4').summernote({
		height: 300,                 // set editor height
		minHeight: null,             // set minimum height of editor
		maxHeight: null,             // set maximum height of editor
		focus: true                  // set focus to editable area after initializing summernote
		});
	}
	if($('#summernote5').length > 0) {
		$('#summernote5').summernote({
		height: 300,                 // set editor height
		minHeight: null,             // set minimum height of editor
		maxHeight: null,             // set maximum height of editor
		focus: true                  // set focus to editable area after initializing summernote
		});
	}


	// Sidebar Slimscroll
	if($slimScrolls.length > 0) {
		$slimScrolls.slimScroll({
			height: 'auto',
			width: '100%',
			position: 'right',
			size: '7px',
			color: '#ccc',
			wheelStep: 10,
			touchScrollStep: 100
		});
		var wHeight = $(window).height() - 60;
		$slimScrolls.height(wHeight);
		$('.sidebar .slimScrollDiv').height(wHeight);
		$(window).resize(function() {
			var rHeight = $(window).height() - 60;
			$slimScrolls.height(rHeight);
			$('.sidebar .slimScrollDiv').height(rHeight);
		});
	}

	// Sidebar
	var Sidemenu = function() {
		this.$menuItem = $('.sidebar-menu a');
	};

	function init() {
		var $this = Sidemenu;
		$('.sidebar-menu a').on('click', function(e) {
			if($(this).parent().hasClass('submenu')) {
				e.preventDefault();
			}
			if(!$(this).hasClass('subdrop')) {
				$('ul', $(this).parents('ul:first')).slideUp(250);
				$('a', $(this).parents('ul:first')).removeClass('subdrop');
				$(this).next('ul').slideDown(350);
				$(this).addClass('subdrop');
			} else if($(this).hasClass('subdrop')) {
				$(this).removeClass('subdrop');
				$(this).next('ul').slideUp(350);
			}
		});
		$('.sidebar-menu ul li.submenu a.active').parents('li:last').children('a:first').addClass('active').trigger('click');
	}

	// Sidebar
	var Colsidemenu = function() {
		this.$menuItems = $('.sidebar-right a');
	};

	function colinit() {
		var $this = Colsidemenu;
		$('.sidebar-right ul a').on('click', function(e) {
			if($(this).parent().hasClass('submenu')) {
				e.preventDefault();
				console.log("1");
			}
			if(!$(this).hasClass('subdrop')) {
				$('ul', $(this).parents('ul:first')).slideUp(250);
				$('a', $(this).parents('ul:first')).removeClass('subdrop');
				$(this).next('ul').slideDown(350);
				$(this).addClass('subdrop');
				console.log("0");
			} else if($(this).hasClass('subdrop')) {
				$(this).removeClass('subdrop');
				$(this).next('ul').slideUp(350);
				console.log("3");
			}
		});
		$('.sidebar-right ul li.submenu a.active').parents('li:last').children('a:first').addClass('active').trigger('click');
	}
	colinit();

	
	// Sidebar Initiate
	init();
	$(document).on('mouseover', function(e) {
        e.stopPropagation();
        if ($('body').hasClass('mini-sidebar') && $('#toggle_btn').is(':visible')) {
            var targ = $(e.target).closest('.sidebar, .header-left').length;
            if (targ) {
                $('body').addClass('expand-menu');
                $('.subdrop + ul').slideDown();
            } else {
                $('body').removeClass('expand-menu');
                $('.subdrop + ul').slideUp();
            }
            return false;
        }
    });

	
	// Date Range Picker

	if($('.bookingrange').length > 0) {
		var start = moment().subtract(6, 'days');
		var end = moment();

		function booking_range(start, end) {
			$('.bookingrange span').html(start.format('M/D/YYYY') + ' - ' + end.format('M/D/YYYY'));
		}

		$('.bookingrange').daterangepicker({
			startDate: start,
			endDate: end,
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			}
		}, booking_range);

		booking_range(start, end);
	}

	//toggle_btn
	$(document).on('click', '#toggle_btn', function() {
		if ($('body').hasClass('mini-sidebar')) {
			$('body').removeClass('mini-sidebar');
			$(this).addClass('active');
			$('.subdrop + ul');
			localStorage.setItem('screenModeNightTokenState', 'night');
			setTimeout(function() {
				$("body").removeClass("mini-sidebar");
				$(".sidebar-logo").addClass("active");
			}, 100);
		} else {
			$('body').addClass('mini-sidebar');
			$(this).removeClass('active');
			$('.subdrop + ul');
			localStorage.removeItem('screenModeNightTokenState', 'night');
			setTimeout(function() {
				$("body").addClass("mini-sidebar");
				$(".sidebar-logo").removeClass("active");
			}, 100);
		}
		return false;
	});

	var myDiv = document.querySelector('.sticky-sidebar-one');


	$('.submenus').on('click', function(){
		$('body').addClass('sidebarrightmenu');
	});
	
	$('#searchdiv').on('click', function(){
		$('.searchinputs').addClass('show');
	});
	$('.search-addon span').on('click', function(){
		$('.searchinputs').removeClass('show');
	});
	$(document).on("click",".productset",function () {
		$(this).toggleClass("active");
	});
	$(document).on("click",".product-info",function () {
		$(this).toggleClass("active");
		if ($(".product-info.active").length > 0) {
			// If "active", hide .empty-cart and show .product-list
			$('.product-wrap .empty-cart').hide();
			$('.product-wrap .product-list').show();
		} else {
			// If not "active", reverse the behavior
			$('.product-wrap .empty-cart').css('display', 'flex');
			$('.product-wrap .product-list').css('display', 'none');
		}
	
	});
	$(document).on("click",".layout-box",function () {
		$('.layout-hide-box').toggleClass("layout-show-box");
	});
	$(document).on("click",".select-option1",function () {
		$('.select-color-add').addClass("selected-color-add");
	});
	$('.bank-box').on('click', function(){
		$('.bank-box').removeClass('active');
		$(this).addClass('active');
	});
	$('.theme-image').on('click', function(){
		$('.theme-image').removeClass('active');
		$(this).addClass('active');
	});
	$('.themecolorset').on('click', function(){
		$('.themecolorset').removeClass('active');
		$(this).addClass('active');
	});
	//Increment Decrement value
	$('.inc.button').click(function(){
	    var $this = $(this),
	        $input = $this.prev('input'),
	        $parent = $input.closest('div'),
	        newValue = parseInt($input.val())+1;
	    $parent.find('.inc').addClass('a'+newValue);
	    $input.val(newValue);
	    newValue += newValue;
	});
	$('.dec.button').click(function(){
	    var $this = $(this),
	        $input = $this.next('input'),
	        $parent = $input.closest('div'),
	        newValue = parseInt($input.val())-1;
	    console.log($parent);
	    $parent.find('.inc').addClass('a'+newValue);
	    $input.val(newValue);
	    newValue += newValue;
	});

	if($('.custom-file-container').length > 0) {
		//First upload
		var firstUpload = new FileUploadWithPreview('myFirstImage')
		//Second upload
		var secondUpload = new FileUploadWithPreview('mySecondImage')
	}

	$('.counters').each(function() {
		var $this = $(this),
			countTo = $this.attr('data-count');
		$({ countNum: $this.text()}).animate({
			countNum: countTo
		},
		{
			duration: 2000,
			easing:'linear',
			step: function() {
			$this.text(Math.floor(this.countNum));
			},
			complete: function() {
			$this.text(this.countNum);
			}
		
		});  
		
	});
	
	if($('.select-color-add').length > 0) {
		const colorSelect = document.getElementById('colorSelect');
		const inputBox = document.getElementById('inputBox');
		const inputShow = document.getElementById('input-show');
		const variantTable = document.getElementById('variant-table');

		// Add an event listener to the select field
		colorSelect.addEventListener('change', function() {
		// Get the selected value from the select field
		const selectedValue = colorSelect.value;
		inputShow.style.display="block"
		variantTable.style.display="block"

		// Set the value of the input box to the selected value
		inputBox.value = selectedValue;
		});
	}


	if($('.win-maximize').length > 0) {
		$('.win-maximize').on('click', function(e){
			if (!document.fullscreenElement) {
				document.documentElement.requestFullscreen();
			} else {
				if (document.exitFullscreen) {
					document.exitFullscreen();
				}
			}
		})
	}


	$(document).on('click', '#check_all', function() {
		$('.checkmail').click();
		return false;
	});
	if($('.checkmail').length > 0) {
		$('.checkmail').each(function() {
			$(this).on('click', function() {
				if($(this).closest('tr').hasClass('checked')) {
					$(this).closest('tr').removeClass('checked');
				} else {
					$(this).closest('tr').addClass('checked');
				}
			});
		});
	}
		
	// Popover
	if($('.popover-list').length > 0) {
		var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
		var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
		return new bootstrap.Popover(popoverTriggerEl)
		})
	}

	// Clipboard 
	if($('.clipboard').length > 0) {
		var clipboard = new Clipboard('.btn');
	}

	// Chat
	var chatAppTarget = $('.chat-window');
	(function() {
		if ($(window).width() > 991)
			chatAppTarget.removeClass('chat-slide');
		
		$(document).on("click",".chat-window .chat-users-list a.media",function () {
			if ($(window).width() <= 991) {
				chatAppTarget.addClass('chat-slide');
			}
			return false;
		});
		$(document).on("click","#back_user_list",function () {
			if ($(window).width() <= 991) {
				chatAppTarget.removeClass('chat-slide');
			}	
			return false;
		});
	})();

	// Mail important
	
	$(document).on('click', '.mail-important', function() {
		$(this).find('i.fa').toggleClass('fa-star').toggleClass('fa-star-o');
	});

		
	var selectAllItems = "#select-all";
	var checkboxItem = ":checkbox";
	$(selectAllItems).on('click', function(){
		
		if (this.checked) {
		$(checkboxItem).each(function() {
			this.checked = true;
		});
		} else {
		$(checkboxItem).each(function() {
			this.checked = false;
		});
		}
		
	});

	var selectAllItems = "#select-all2";
	var checkboxItem = ":checkbox";
	$(selectAllItems).on('click', function(){
		
		if (this.checked) {
		$(checkboxItem).each(function() {
			this.checked = true;
		});
		} else {
		$(checkboxItem).each(function() {
			this.checked = false;
		});
		}
		
	});

	var selectAllItems = ".select-all";
	var checkboxItem = ":checkbox";
	$(selectAllItems).on('click', function(){
		
		if (this.checked) {
		$(checkboxItem).each(function() {
			this.checked = true;
		});
		} else {
		$(checkboxItem).each(function() {
			this.checked = false;
		});
		}
		
	});
		
	// Tooltip
	if($('[data-bs-toggle="tooltip"]').length > 0) {
		var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
		var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
			return new bootstrap.Tooltip(tooltipTriggerEl)
		})
	}

	// Sidebar Visible
	
	$('.open-layout').on("click", function (s) {
		s.preventDefault();
		$('.sidebar-layout').addClass('show-layout');
		$('.sidebar-settings').removeClass('show-settings');
	});
	$('.btn-closed').on("click", function (s) {
		s.preventDefault();
		$('.sidebar-layout').removeClass('show-layout');
	});
	$('.open-settings').on("click", function (s) {
		s.preventDefault();
		$('.sidebar-settings').addClass('show-settings');
		$('.sidebar-layout').removeClass('show-layout');
	});

	$('.btn-closed').on("click", function (s) {
		s.preventDefault();
		$('.sidebar-settings').removeClass('show-settings');
	});

	$('.open-siderbar').on("click", function (s) {
		s.preventDefault();
		$('.siderbar-view').addClass('show-sidebar');
	});

	$('.btn-closed').on("click", function (s) {
		s.preventDefault();
		$('.siderbar-view').removeClass('show-sidebar');
	});

	if($('.toggle-switch').length > 0) {
		const toggleSwitch = document.querySelector('.toggle-switch input[type="checkbox"]');
		const currentTheme = localStorage.getItem('theme');
		var app = document.getElementsByTagName("BODY")[0];

		if (currentTheme) {
			app.setAttribute('data-theme', currentTheme);
		  
			if (currentTheme === 'dark') {
				toggleSwitch.checked = true;
			}
		}

		function switchTheme(e) {
			if (e.target.checked) {
				app.setAttribute('data-theme', 'dark');
				localStorage.setItem('theme', 'dark');
			}
			else {       
				app.setAttribute('data-theme', 'light');
				localStorage.setItem('theme', 'light');
			}    
		}

		toggleSwitch.addEventListener('change', switchTheme, false);	
	}
	
	if(window.location.hash == "#LightMode"){
		localStorage.setItem('theme', 'dark');
	}
	else {
		if(window.location.hash == "#DarkMode"){
			localStorage.setItem('theme', 'light');
		}
	}

	
	$('ul.tabs li').click(function(){
		var $this = $(this);
		var $theTab = $(this).attr('id');
		console.log($theTab);
		if($this.hasClass('active')){
		  // do nothing
		} else{
		  $this.closest('.tabs_wrapper').find('ul.tabs li, .tabs_container .tab_content').removeClass('active');
		  $('.tabs_container .tab_content[data-tab="'+$theTab+'"], ul.tabs li[id="'+$theTab+'"]').addClass('active');
		}
		
	});

	// Otp Verfication  
	$('.digit-group').find('input').each(function () { 
		$(this).attr('maxlength', 1); 
		$(this).on('keyup', function (e) { 
		var parent = $($(this).parent()); 
		if (e.keyCode === 8 || e.keyCode === 37) { 
		var prev = parent.find('input#' + $(this).data('previous')); 
		if (prev.length) { $(prev).select(); 
		} 
		} 
		else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {  
		var next = parent.find('input#' + $(this).data('next')); 
		if (next.length) { 
		$(next).select(); 
		} else { 
		if (parent.data('autosubmit')) { 
		parent.submit(); 
		}
		} 
		} 
		}); 
		}); 
		$('.digit-group input').on('keyup', function () { 
		var self = $(this); 
		if (self.val() != '') { 
		self.addClass('active'); 
		} else { 
		self.removeClass('active'); 
		} 
	});

	// Date Range Picker
	if ($('input[name="datetimes"]').length > 0) {
		$('input[name="datetimes"]').daterangepicker({
		timePicker: true,
		startDate: moment().startOf('hour'),
		endDate: moment().startOf('hour').add(32, 'hour'),
		locale: {
		format: 'M/DD hh:mm A'
		}
	});
	}

$(".close_profile").on('click', function () {
	$('.right-side-contact').addClass('hide-right-sidebar');
	$('.right-side-contact').removeClass('show-right-sidebar');
	if ( $(window).width() > 991 && $(window).width() < 1201) {
		$(".chat").css('margin-left', 0);
	}
	if ($(window).width() < 992) {
		$('.chat').removeClass('hide-chatbar');
	}
});


if($('.emoj-action').length > 0) {
	$(".emoj-action").on('click', function () {
		$('.emoj-group-list').toggle();
	});
}

if($('.emoj-action-foot').length > 0) {
	$(".emoj-action-foot").on('click', function () {
		$('.emoj-group-list-foot').toggle();
	});
}

if($('.custom-input').length > 0) {
	const inputRange = document.querySelector('.custom-input');

	inputRange.addEventListener('input', function () {
		const progress = (inputRange.value - inputRange.min) / (inputRange.max - inputRange.min) * 100;
		inputRange.style.background = `linear-gradient(to top, var(--md-sys-color-on-surface-variant) 0%, var(--md-sys-color-on-surface-variant) ${progress}%, var(--md-sys-color-surface-variant) ${progress}%, var(--md-sys-color-surface-variant) 100%)`;
	});
}

//Chat Resize

$(".close_profile").on("click", function () {
	$('.right-user-side').removeClass('open-message');
	$('.chat-center-blk .card-comman').addClass('chat-center-space');
});
$(".profile-open").on("click", function () {
	$('.right-user-side').removeClass('add-setting');
	$('.chat-center-blk .card-comman').removeClass('chat-center-space');
});

//Call Resize
$(".close_profile").on("click", function () {
	$('.right-user-side').removeClass('open-message');
	$('.video-screen-inner').removeClass('video-space');
	$('.right-side-party').removeClass('open-message');
	$('.meeting-list').removeClass('add-meeting');
	$('#chat-room').removeClass('open-chats');
	$('.meeting-list').removeClass('add-meeting');
	$('.call-user-side').addClass('add-setting');
});
$("#add-partispant").on("click", function () {
	$('.right-side-party').addClass('open-message');
	$('#chat-room').removeClass('open-chats');
	$('.meeting-list').addClass('add-meeting');
});
$("#show-message").on("click", function () {
	$('#chat-room').addClass('open-chats');
	$('.right-side-party').removeClass('open-message');
	$('.meeting-list').addClass('add-meeting');
});

//Chat Search Visible
$('.chat-search-btn').on('click', function () {
	$('.chat-search').addClass('visible-chat');
});
$('.close-btn-chat').on('click', function () {
	$('.chat-search').removeClass('visible-chat');
});
$(".chat-search .form-control").on("keyup", function() {
	var value = $(this).val().toLowerCase();
	$(".chat .chat-body .messages .chats").filter(function() {
	  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	});
});
	  

});
function toggleFullscreen(elem) {
	elem = elem || document.documentElement;
	if (!document.fullscreenElement && !document.mozFullScreenElement &&
	  !document.webkitFullscreenElement && !document.msFullscreenElement) {
	  if (elem.requestFullscreen) {
		elem.requestFullscreen();
	  } else if (elem.msRequestFullscreen) {
		elem.msRequestFullscreen();
	  } else if (elem.mozRequestFullScreen) {
		elem.mozRequestFullScreen();
	  } else if (elem.webkitRequestFullscreen) {
		elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
	  }
	} else {
	  if (document.exitFullscreen) {
		document.exitFullscreen();
	  } else if (document.msExitFullscreen) {
		document.msExitFullscreen();
	  } else if (document.mozCancelFullScreen) {
		document.mozCancelFullScreen();
	  } else if (document.webkitExitFullscreen) {
		document.webkitExitFullscreen();
	  }
	}
  }

  //Increment Decrement Numberes
	$(".quantity-btn").on("click", function () {

        var $button = $(this);
        var oldValue = $button.closest('.product-quantity').find("input.quntity-input").val();
        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.closest('.product-quantity').find("input.quntity-input").val(newVal);
	});

		// Custom Country Code Selector

		if ($('#phone').length > 0) {
			var input = document.querySelector("#phone");
			window.intlTelInput(input, {
				utilsScript: "assets/plugins/intltelinput/js/utils.js",
			});
		}

		// Custom Country Code Selector

		if ($('#phone2').length > 0) {
			var input = document.querySelector("#phone2");
			window.intlTelInput(input, {
				utilsScript: "assets/plugins/intltelinput/js/utils.js",
			});
		}

		if ($('#phone3').length > 0) {
			var input = document.querySelector("#phone3");
			window.intlTelInput(input, {
				utilsScript: "assets/plugins/intltelinput/js/utils.js",
			});
		}

		// Remove Product
		$(document).on("click",".remove-product",function () {
			$(this).parent().parent().hide();
		});

		// Datetimepicker time

	if ($('.timepicker').length > 0) {
		$('.timepicker').datetimepicker({
			format: 'HH:mm A',
			icons: {
				up: "fas fa-angle-up",
				down: "fas fa-angle-down",
				next: 'fas fa-angle-right',
				previous: 'fas fa-angle-left'
			}
		});
	}

	$(".add-extra").on('click', function () {

		var servicecontent = '<div class="row">' +
			'<div class="col-lg-4 col-sm-6 col-12">' +
			'<div class="form-group add-product">' +
			'<div class="add-newplus">' +
			'<label>Category</label>' +
			'</div>' +
			'<select class="select">' +
			'<option>Select</option>' +
			'<option>Computers</option>' +
			'</select>' +
			'</div>' +
			'</div>' +
			'<div class="col-lg-4 col-sm-6 col-12">' +
			'<div class="form-group add-product">' +
			'<label>Choose Category</label>' +
			'<select class="select">' +
			'<option>Select</option>' +
			'<option>Computers</option>' +
			'</select>' +
			'</div>' +
			'</div>' +
			'<div class="col-lg-4 col-sm-6 col-12">' +
			'<div class="d-flex align-items-center">' +
			'<div class="form-group w-100 add-product">' +
			'<label>Sub Category</label>' +
			'<select class="select">' +
			'<option>Select</option>' +
			'<option>Computers</option>' +
			'</select>' +
			'</div>' +
			'<div class="input-blocks">' + 
			'<a href="#" class="btn btn-danger-outline trash"><i class="far fa-trash-alt"></i></a>' +
			'</div>' +
			'</div>' +
			'</div>';
			
			setTimeout(function () {
				$('.select');
				setTimeout(function () {
					$('.select').select2({
						minimumResultsForSearch: -1,
						width: '100%'
					});
				}, 100);
			}, 100);
		$(".addservice-info").append(servicecontent);
		return false;
	});

	$(".add-extra-item-two").on('click', function () {

		var servicecontent = '<div class="row">' +
			'<div class="col-lg-4 col-sm-6 col-12">' +
			'<div class="form-group add-product">' +
			'<div class="add-newplus">' +
			'<label>Brand</label>' +
			'</div>' +
			'<select class="select">' +
			'<option>Select</option>' +
			'<option>Computers</option>' +
			'</select>' +
			'</div>' +
			'</div>' +
			'<div class="col-lg-4 col-sm-6 col-12">' +
			'<div class="form-group add-product">' +
			'<label>Unit</label>' +
			'<select class="select">' +
			'<option>Select</option>' +
			'<option>Computers</option>' +
			'</select>' +
			'</div>' +
			'</div>' +
			'<div class="col-lg-4 col-sm-6 col-12">' +
			'<div class="d-flex align-items-center">' +
			'<div class="form-group w-100 add-product">' +
			'<label>Selling Type</label>' +
			'<select class="select">' +
			'<option>Select</option>' +
			'<option>Computers</option>' +
			'</select>' +
			'</div>' +
			'<div class="input-blocks">' + 
			'<a href="#" class="btn btn-danger-outline trash"><i class="far fa-trash-alt"></i></a>' +
			'</div>' +
			'</div>' +
			'</div>';
			setTimeout(function () {
				$('.select');
				setTimeout(function () {
					$('.select').select2({
						minimumResultsForSearch: -1,
						width: '100%'
					});
				}, 100);
			}, 100);
			

		$(".add-product-new").append(servicecontent);
		return false;
	});

		// Remove Gallery
		$(document).on("click",".remove-color",function () {
			$(this).parent().parent().parent().hide();
		});
	
	// Collapse Header
	if($('#btnFullscreen').length > 0) {
		document.getElementById('btnFullscreen').addEventListener('click', function() {
			toggleFullscreen();
		  });
	}


$(document).ready(function(){
	
	if($('#collapse-header').length > 0) {
		document.getElementById('collapse-header').onclick = function() {
		    this.classList.toggle('active');
		    document.body.classList.toggle('header-collapse');
		}
	}

	if($('#file-delete').length > 0) {
		$("#file-delete").on("click", function () {
			$('.deleted-table').addClass('d-none');
			$('.deleted-info').addClass('d-block');
		});
	}
	// POS Category Slider
	if($('.pos-category').length > 0) {      
		$('.pos-category').owlCarousel({
			items: 6,
			loop:false,
			margin:8,
			nav:true,
			dots: false,
			autoplay:false,
			smartSpeed: 1000,
			navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
			responsive:{
				0:{
					items:2
				},
				500:{
					items:3
				},
				768:{
					items:4
				},
				991:{
					items:5
				},
				1200:{
					items:6
				},
				1401:{
					items:6
				}
			}
		})
	}

	if($('.folders-carousel').length > 0) {
		$('.folders-carousel').owlCarousel({
		    loop:true,
		    margin:15,
		    items:2,
		    nav:true,
		    dots: false,
		    // stageOuterClass: 'owl-stage-outer overflow-visible',
		    navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
		  	responsive:{
		  		0: {
					items: 1
				},
				768: {
					items: 2
				},
				1400: {
					items: 3
				}
		    }
		});
	}

	// Files Slider
	if($('.files-carousel').length > 0) {      
		$('.files-carousel').owlCarousel({
			items: 3,
			loop:true,
			margin:15,
			nav:true,
			dots: false,
			smartSpeed: 1000,
			// stageOuterClass: 'owl-stage-outer overflow-visible',
			navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
			responsive:{
				0: {
					items: 1
				},
				768: {
					items: 2
				},
				1200: {
					items: 3
				}
			}
		})
	}

	if($('.video-section').length > 0) {
		$('.video-section').owlCarousel({
		    loop:true,
		    margin:15,
		    items:3,
		    nav:true,
		    dots: false,
		    // stageOuterClass: 'owl-stage-outer overflow-visible',
		    navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
			responsive:{
				0: {
					items: 1
				},
				768: {
					items: 2
				},
				1200: {
					items: 3
				}
			}
		});

		var playerSettings = {
		      controls : ['play-large'],
		      fullscreen : { enabled: false},
		      resetOnEnd : true,
		      hideControls  :true,
	  			clickToPlay:true,
		      keyboard : false,
		    }

		const players = Plyr.setup('.js-player', playerSettings);

		 players.forEach(function(instance,index) {
		            instance.on('play',function(){
		                players.forEach(function(instance1,index1){
		                  if(instance != instance1){
		                        instance1.pause();
		                    }
		                });
		            });
		        });

		$('.video-section').on('translated.owl.carousel', function (event) {
		  players.forEach(function(instance,index1){
		                  instance.pause();
		                });
		});
	}
	if($('.video-section').length > 0 || ('.files-carousel').length > 0 || ('.folders-carousel').length > 0) {
		$('.video-section, .files-carousel, .folders-carousel')
	    .each(function() {
	      let carousel = $(this);
	      carousel.on('show.bs.dropdown', '[data-bs-toggle=dropdown]', function() {
	      	// universal solution
	        let dropdown = bootstrap.Dropdown.getInstance(this);
	        $(dropdown._menu).insertAfter(carousel);

			//alternative for this particular layout
	        $(this).next('.dropdown-menu').insertAfter(carousel);
	      });
	    })
	}

	// Increment Decrement

	$(".inc").on('click', function() {
	    updateValue(this, 1);
	});
	$(".dec").on('click', function() {
	    updateValue(this, -1);
	});
	function updateValue(obj, delta) {
	    var item = $(obj).parent().find("input");
	    var newValue = parseInt(item.val(), 10) + delta;
	    item.val(Math.max(newValue, 0));
	}

	//common Sidebar Toggle Fun
	if($('.popup-toggle').length > 0) {
		$(".popup-toggle").click(function(){
			$(".toggle-sidebar").addClass("open-sidebar");
		});
		$(".sidebar-closes").click(function(){
			$(".toggle-sidebar").removeClass("open-sidebar");
		});
	}
	setTimeout(function(){$('#upload-file').modal('hide')},4000);
	setTimeout(function(){$('#upload-folder').modal('hide')},4000);
	$(".upload-modal").on("hidden.bs.modal", function () {
		// alert('modal closed');
		$(".upload-message").modal('show');
	  	setTimeout(function(){$('.upload-message').modal('hide')},3000);
	});

	  /* card with fullscreen */
	  let DIV_CARD = ".card";
	  let cardFullscreenBtn = document.querySelectorAll(
		'[data-bs-toggle="card-fullscreen"]'
	  );
	  cardFullscreenBtn.forEach((ele) => {
		ele.addEventListener("click", function (e) {
		  let $this = this;
		  let card = $this.closest(DIV_CARD);
		  card.classList.toggle("card-fullscreen");
		  card.classList.remove("card-collapsed");
		  e.preventDefault();
		  return false;
		});
	  });
	  /* card with fullscreen */

	    /* card with close button */
  		let DIV_CARD_CLOSE = ".card";
		let cardRemoveBtn = document.querySelectorAll(
			'[data-bs-toggle="card-remove"]'
		);
		cardRemoveBtn.forEach((ele) => {
			ele.addEventListener("click", function (e) {
			e.preventDefault();
			let $this = this;
			let card = $this.closest(DIV_CARD_CLOSE);
			card.remove();
			return false;
			});
		});
		/* card with close button */

	// View all Show hide One
	if($('.more-menu').length > 0) {
		$(".more-menu").hide();
		$(".viewall-button").on("click", function() {
			$(this).text($(this).text() === "Less" ? "Show More" : "Less");
			$(".more-menu").slideToggle(900);
		});	  	
	}

	if($('.more-menu-2').length > 0) {
		$(".more-menu-2").hide();
		$(".viewall-button-2").on("click", function() {
			$(this).text($(this).text() === "Less" ? "Show More" : "Less");
			$(".more-menu-2").slideToggle(900);
		});	  	
	}
	
	if($('.more-menu-3').length > 0) {
		$(".more-menu-3").hide();
		$(".viewall-button-3").on("click", function() {
			$(this).text($(this).text() === "Less" ? "Show More" : "Less");
			$(".more-menu-3").slideToggle(900);
		});	  	
	}

	//Channel Logo Slider
	if ($('.channels-slider').length > 0) {
		$('.channels-slider').owlCarousel({
			loop: true,
			margin: 24,
			dots: false,
			nav: true,
			smartSpeed: 2000,
			navContainer: '.custom-nav',
			navText: [
				'<i class="ti ti-arrow-narrow-left"></i>',
				'<i class="ti ti-arrow-narrow-right"></i>'
			],
			responsive: {
				0: {
					items: 3
				},
				768: {
					items: 8
				},
				1300: {
					items: 8
				}
			}
		})
	}

	//Social Gallery Slider
	if ($('.social-gallery-slider').length > 0) {
		$('.social-gallery-slider').owlCarousel({
			loop: true,
			margin: 8,
			dots: false,
			nav: false,
			smartSpeed: 2000,
			responsive: {
				0: {
					items: 2
				},
				768: {
					items: 3
				},
				1300: {
					items: 4
				}
			}
		})
	}

	// Kanban Drag

	if($('.kanban-drag-wrap').length > 0) {
		$(".kanban-drag-wrap").sortable({
			connectWith: ".kanban-drag-wrap",
			handle: ".kanban-card",
			placeholder: "drag-placeholder"
		});
	}

	// Datetimepicker
	if($('.datepic').length > 0 ){
		$('.datepic').datetimepicker({
			format: 'DD-MM-YYYY',
			keepOpen: true,inline: true,
			icons: {
				up: "fas fa-angle-up",
				down: "fas fa-angle-down",
				next: 'fas fa-angle-right',
				previous: 'fas fa-angle-left'
			}
		});
	}

	// Compose Mail Popup
	$("#compose_mail").on('click', function () {
		$('body').append('<div class="modal-backdrop fade show"></div>');
		$('#compose-view').addClass('show');
	});
	
	$("#compose-close").on('click', function () {
		$('.modal-backdrop').remove();
		$('#compose-view').removeClass('show');
	});

	// POS3 Category Slider
	if($('.pos-category3').length > 0) {      
		$('.pos-category3').owlCarousel({
			items: 6,
			loop:false,
			margin:8,
			nav:false,
			dots: false,
			autoplay:false,
			smartSpeed: 1000,
			autoWidth:true,
			responsive:{
				0:{
					items:2
				},
				500:{
					items:3
				},
				768:{
					items:4
				},
				991:{
					items:5
				},
				1200:{
					items:6
				},
				1400:{
					items:6
				}
			}
		})
	}

	// POS4 Category Slider
	if($('.pos-category4').length > 0) {      
		$('.pos-category4').owlCarousel({
			items: 6,
			loop:false,
			margin:8,
			nav:false,
			dots: false,
			autoplay:false,
			smartSpeed: 1000,
			autoWidth:true,
			responsive:{
				0:{
					items:2
				},
				500:{
					items:3
				},
				768:{
					items:4
				},
				991:{
					items:5
				},
				1200:{
					items:6
				},
				1400:{
					items:6
				}
			}
		})
	}

	// POS4 Category Slider
	if($('.pos-category5').length > 0) {      
		$('.pos-category5').owlCarousel({
			items: 6,
			loop:false,
			margin:0,
			nav:false,
			dots: false,
			autoplay:false,
			smartSpeed: 1000,
			animateOut: "slideOutUp",
			animateIn: "slideIntUp",
			responsive:{
				0:{
					items:1
				},
				500:{
					items:3
				},
				768:{
					items:4
				},
				991:{
					items:5
				},
				1200:{
					items:6
				}
			}
		})
		// Additional CSS
		$('.pos-category5').css({
			display: 'block', 
			height: '100%', 
			overflow: 'hidden', 
		});
	}

	// Select Payment

	if($('.select-payment').length > 0) {    
		$('.modal').each(function () {
			let $modal = $(this); // Select the current modal
	
			const optionMap = {
				cash: 'quick-cash',
				points: 'point-wrap',
				card: 'card-wrap'
			};	
			function updatePaymentContent($modal) {
				const selectedValue = $modal.find('.select-payment').val();
				$modal.find('.payment-content').hide();
				$modal.find('.point-item').hide();
	
				if (selectedValue && optionMap[selectedValue]) {
					$modal.find(`.${optionMap[selectedValue]}`).show();
				}
	
				if (selectedValue === 'points') {
					$modal.find('.change-item').hide();
					$modal.find('.point-item').show();
				}
			}
			$modal.on('shown.bs.modal', function () {
				updatePaymentContent($modal);
			});
			$modal.find('.select-payment').on('change', function () {
				updatePaymentContent($modal);
			});
			updatePaymentContent($modal);
		});
	}

	// Active Payment

	$('.payment-item').on("click", function (s) {
		$('.payment-item').removeClass('active');
		$(this).addClass('active');
	});

	// YearPicker

	if($('.yearpicker').length > 0 ){
		$('.yearpicker').datetimepicker({
			viewMode: 'years',
			format: 'YYYY',

			icons: {
				up: "fas fa-angle-up",
				down: "fas fa-angle-down",
				next: 'fas fa-angle-right',
				previous: 'fas fa-angle-left'
			}
		});
	}
	
	// Attach keydown event only when modal is open
    $('#calculator').on('shown.bs.modal', function () {
        document.addEventListener("keydown", myFunction);
    });

    // Remove keydown event when modal is closed
    $('#calculator').on('hidden.bs.modal', function () {
        document.removeEventListener("keydown", myFunction);
    });

	// Circle Progress

	$(".circle-progress").each(function() {
  
		var value = $(this).attr('data-value');
		var left = $(this).find('.progress-left .progress-bar');
		var right = $(this).find('.progress-right .progress-bar');
	
		if (value > 0) {
		  if (value <= 50) {
			right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
		  } else {
			right.css('transform', 'rotate(180deg)')
			left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
		  }
		}
	
	  })
	
	  function percentageToDegrees(percentage) {  
		return percentage / 100 * 360  
	  }
	  const bottomcenterToast2 = document.querySelectorAll('.delete-toast-btn');
	  const bottomcentertoastExample2 = document.querySelectorAll('.delete-toast');
  
	  bottomcenterToast2.forEach((a, index) => {
	  a.addEventListener('click', () => {
	  const toast = new bootstrap.Toast(bottomcentertoastExample2[index]);
	  toast.show();
	  });
	});

	
	// Active Payment

	$('.customer-item .close-icon').on("click", function (s) {
		$(this).closest('.customer-item').remove();
	});

	$(".additem-info").on("click", ".trash-icon", function () {
		$(this).closest('.add-info').remove();
	});

	$(".add-item").on('click', function () {

		var addcontent = '<div class="bg-light p-3 add-info">'+
		'<div class="row align-items-center g-2">'+
			'<div class="col-lg-2">'+
				'<h6 class="fs-14 fw-semibold">Payment</h6>'+
			'</div>'+
			'<div class="col-lg-4">'+
				'<select class="select">'+
					'<option>Cash</option>'+
					'<option>Card</option>'+
				'</select>'+
			'</div>'+
			'<div class="col-lg-4">'+
				'<input type="text" class="form-control" placeholder="Enter Amount">'+
			'</div>'+
			'<div class="col-lg-2">'+
				'<div class="d-flex align-items-center gap-2">'+
					'<button class="btn btn-dark w-100">Charge</button>'+
					'<a href="#" class="trash-icon"><i class="ti ti-trash"></i></a>'+
				'</div>'
			'</div>'+
		'</div>'+
	'</div>';
			
			setTimeout(function () {
				$('.select');
				setTimeout(function () {
					$('.select').select2({
						minimumResultsForSearch: -1,
						width: '100%'
					});
				}, 100);
			}, 100);
		$(".additem-info").append(addcontent);
		return false;
	});

	// Todo Strike Content
	$('.todo-item input').on('click', function(){
		$(this).parent().parent().toggleClass('todo-strike');
	});

	$('.todo-inbox-check input').on('click', function(){
		$(this).parent().parent().toggleClass('todo-strike-content');
	});

	$('.todo-list input').on('click', function(){
		$(this).parent().parent().toggleClass('todo-strike-content');
	});

});

// Catogery and Brand dropdown

$(function () {
    var brandOptions = {
      Laptop: ["Lenovo", "HP", "Dell","Apple"],
      Mobile: ["Oppo", "Apple", "Samsung", "OnePlus"],
      Headset: ["Leaf", "Skullcandy", "Apple", "Samsung"],
      Watch: ["Rolex", "Omega", "Rado", "Titan"]
    };

    $('#productCategory').change(function () {
      var selected = $(this).val();
      var $brand = $('#productBrand');

      // Reset brand options
      $brand.html('<option value="">Select</option>');

      if (selected && brandOptions[selected]) {
        var options = '';
        for (var i = 0; i < brandOptions[selected].length; i++) {
          var brand = brandOptions[selected][i];
          options += `<option value="${brand}">${brand}</option>`;
        }
        $brand.append(options);
      }
    });
  });

// calc TotalUnitPice

function calcuTotalUnitPrice() {
            const productQty = parseFloat(document.getElementById('productQty').value);
            const productPrice = parseFloat(document.getElementById('productPrice').value);

                if (isNaN(productPrice) || productPrice <= 0 || isNaN(productQty) || productQty <= 0) {
			        
			        document.getElementById('totalunitPrice').value = '';
			        return;
			    }

            const totalunitPrice = productPrice * productQty;

            document.getElementById('totalunitPrice').value = totalunitPrice.toFixed(2);
        }

// Calculate Discount

function calcuDiscount() {
            const productQty = parseFloat(document.getElementById('productQty').value);
            const productPrice = parseFloat(document.getElementById('productPrice').value);
            const discountPercentage = parseFloat(document.getElementById('discountPercentage').value);

					if (isNaN(productQty) || productQty <= 0 || isNaN(productPrice) || productPrice <= 0 || isNaN(productQty) || productQty <= 0 || isNaN(discountPercentage) || discountPercentage < 0) {			        
			        document.getElementById('totalunitPrice').value = '';
			        document.getElementById('discountAmount').value = '';			        
			        document.getElementById('finalPrice').value = '';
			        return;
			    }

            const totalunitPrice = productPrice * productQty;
            const discountAmount = (productPrice * discountPercentage) / 100;
            const finalPrice = productPrice - discountAmount;

            document.getElementById('totalunitPrice').value = totalunitPrice.toFixed(2);
            document.getElementById('discountAmount').value = discountAmount.toFixed(2);
            document.getElementById('finalPrice').value = finalPrice.toFixed(2);
        }



// pos add product to sell

document.addEventListener('DOMContentLoaded', function () {
  const productWrap = document.querySelector('.product-wrap');
  const productCount = document.querySelector('.count');
  const emptyCart = document.querySelector('.empty-cart');
  const addedIds = new Set();

  // Handle product selection
  document.querySelectorAll('.select-product').forEach(function (card) {
    card.addEventListener('click', function () {
      const id = this.dataset.id;
      const name = this.dataset.name;
      const image = this.dataset.image;
      const price = parseFloat(this.dataset.price).toFixed(2);

      if (addedIds.has(id)) {
        // Remove from cart
        const productEl = productWrap.querySelector(`.product-list[data-id="${id}"]`);
        if (productEl) productEl.remove();
        addedIds.delete(id);
        this.classList.remove('selected');
      } else {

      this.classList.add('selected');
      if (emptyCart) emptyCart.style.display = 'none';

      const productHTML = `
        <div class="product-list align-items-center justify-content-between" data-id="${id}" data-price="${price}">
          <div class="d-flex align-items-center product-info">
            <a href="#" class="pro-img">
              <img src="${image}" alt="${name}" width="50">
            </a>
            <div class="info">
              <span>${id}</span>
              <h6>${name}</h6>
              <p class="fw-bold text-teal total-price"><i class="fa-solid fa-indian-rupee-sign"></i>${price}</p>
            </div>
          </div>
          <div class="qty-item text-center">
            <a href="#" class="dec d-flex justify-content-center align-items-center">
              <i data-feather="minus-circle" class="feather-14"></i>
            </a>
            <input type="text" class="form-control text-center" name="qty" value="1" readonly>
            <a href="#" class="inc d-flex justify-content-center align-items-center">
              <i data-feather="plus-circle" class="feather-14"></i>
            </a>
          </div>
          <div class="d-flex align-items-center action">
            <a class="btn-icon edit-icon me-1" href="#" data-bs-toggle="modal" data-bs-target="#edit-product">
              <i data-feather="edit" class="feather-14"></i>
            </a>
            <a class="btn-icon delete-icon remove-product" href="javascript:void(0);">
              <i data-feather="trash-2" class="feather-14 text-danger"></i>
            </a>
          </div>
        </div>
      `;

      productWrap.insertAdjacentHTML('beforeend', productHTML);
      addedIds.add(id);
      }

      // Update cart count
      productCount.textContent = addedIds.size;
      feather.replace();

      // Show empty cart if no items
      if (addedIds.size === 0 && emptyCart) emptyCart.style.display = 'block';
      updateSubTotal();
    });
  });

  // Quantity +/- and remove handlers
  productWrap.addEventListener('click', function (e) {
    const incBtn = e.target.closest('.inc');
    const decBtn = e.target.closest('.dec');
    const removeBtn = e.target.closest('.remove-product');

    if (incBtn || decBtn) {
      e.preventDefault();
      const qtyItem = e.target.closest('.qty-item');
      const input = qtyItem.querySelector('input[name="qty"]');
      const productEl = e.target.closest('.product-list');
      const price = parseFloat(productEl.dataset.price);
      let qty = parseInt(input.value) || 1;

      if (incBtn) qty++;
      else if (decBtn && qty > 1) qty--;

      input.value = qty;
      productEl.querySelector('.total-price').innerHTML = 
  `<i class="fa-solid fa-indian-rupee-sign"></i>${(price * qty).toFixed(2)}`;

      updateSubTotal();
    }

    if (removeBtn) {
      const productEl = e.target.closest('.product-list');
      const id = productEl.dataset.id;
      productEl.remove();
      addedIds.delete(id);
      productCount.textContent = addedIds.size;

      document.querySelectorAll('.select-product').forEach(card => {
        if (card.dataset.id === id) {
          card.classList.remove('selected');
        }
      });

      if (addedIds.size === 0 && emptyCart) emptyCart.style.display = 'block';
      updateSubTotal();
    }
  });

 // Clear Cart
document.getElementById('clear-cart').addEventListener('click', function () {
    // Remove all product items
    document.querySelectorAll('.product-list').forEach(el => el.remove());

    // Clear the added product IDs
    addedIds.clear();

    // Reset product count
    productCount.textContent = 0;

    // Remove 'selected' class from all product cards
    document.querySelectorAll('.select-product').forEach(card => card.classList.remove('selected'));

    // Show empty cart message if available
    if (emptyCart) emptyCart.style.display = 'block';

    // Clear tax, shipping, and discount fields
    const gstSelect = document.getElementById('gst-select');
    const shippingSelect = document.getElementById('shipping-select');
    const discountSelect = document.getElementById('discount-select');

    if (gstSelect) gstSelect.value = 'select';
    if (shippingSelect) shippingSelect.value = '0';
    if (discountSelect) discountSelect.value = '0%';

    // Optionally reset grand total display (if using a visible element)
    const grandTotalEl = document.getElementById('grand-total');
    if (grandTotalEl) {
        grandTotalEl.textContent = 'Grand Total : $0.00';
    }

    // Recalculate subtotal or totals
    updateSubTotal();
});

  // Dropdown listeners
  const gstSelect = document.getElementById("gst-select");
  const shippingSelect = document.getElementById("shipping-select");
  const discountSelect = document.getElementById("discount-select");

  if (gstSelect) gstSelect.addEventListener("change", updateGSTandGrandTotal);
  if (shippingSelect) shippingSelect.addEventListener("change", updateGSTandGrandTotal);
  if (discountSelect) discountSelect.addEventListener("change", updateGSTandGrandTotal);

  updateSubTotal(); // initial load
});

function updateSubTotal() {
  let total = 0;

  document.querySelectorAll('.product-list').forEach(function (item) {
    const qtyInput = item.querySelector('input[name="qty"]');
    const qty = qtyInput ? parseInt(qtyInput.value) || 0 : 0;
    const price = parseFloat(item.dataset.price) || 0;
    total += qty * price;
  });

  const subTotalElement = document.getElementById('sub-total');
  if (subTotalElement) subTotalElement.textContent = total.toFixed(2);

  updateGSTandGrandTotal();
}

function updateGSTandGrandTotal() {
  const subtotal = parseFloat(document.getElementById("sub-total").innerText) || 0;
  const gstRate = parseFloat(document.getElementById("gst-select").value) || 0;
  const shipping = parseFloat(document.getElementById("shipping-select").value) || 0;
  const discountRate = parseFloat(document.getElementById("discount-select").value) || 0;

  const gstAmount = (subtotal * gstRate) / 100;
  const discountAmount = (subtotal * discountRate) / 100;
  const grandTotal = subtotal + gstAmount + shipping - discountAmount;

  document.getElementById("gst-label").innerText = `Tax (GST ${gstRate}%)`;
  document.getElementById("gst-amount").innerText = gstAmount.toFixed(2);
  document.getElementById("shipping-amount").innerText = shipping.toFixed(2);
  document.getElementById("discount-amount").innerText = discountAmount.toFixed(2);
  document.getElementById("grand-total").innerText = grandTotal.toFixed(2);

  const grandTotalBtn = document.getElementById("grand-total-btn");
  if (grandTotalBtn) {
    grandTotalBtn.innerText = grandTotal.toFixed(2);
  }

    // Update scanner total
  const scannerTotalEl = document.getElementById("scanner-total");
  if (scannerTotalEl) {
    scannerTotalEl.textContent = grandTotal.toFixed(2);
  }

      // Update cash pay total
  const cashpayTotalEl = document.getElementById("cashpay-total");
  if (cashpayTotalEl) {
    cashpayTotalEl.value = grandTotal.toFixed(2);
  }
}

//

document.addEventListener('DOMContentLoaded', () => {
  const paymentBtn = document.querySelector('[data-bs-target="#payment-completed"]');

  if (paymentBtn) {
    paymentBtn.addEventListener('click', function (e) {
      const productEls = document.querySelectorAll('.product-list');

      if (productEls.length === 0) {
        e.preventDefault();
        alert("No products added to the order.");
        window.location.href = "<?php echo base_url('Pointofsales'); ?>"; // Adjust if needed
        return;
      }

      // Generate Invoice Number
      const invoiceNumber = generateInvoiceNumber();

      // Get customer and totals
      const customerSelect = document.getElementById('customer-select');
      const selectedOption = customerSelect.options[customerSelect.selectedIndex];
      const customerName = selectedOption.text;
      const customerPhone = document.getElementById('customer-phone').value;
      const customerCity = document.getElementById('customer-city').value;

      // Fetch from data attributes
      const customerId = selectedOption.getAttribute('data-id');
      const customerCreated = selectedOption.getAttribute('data-created') || new Date().toLocaleDateString();

      const subTotal = parseFloat(document.getElementById('sub-total').innerText) || 0;
      const tax = parseFloat(document.getElementById('gst-amount').innerText) || 0;
      const shipping = parseFloat(document.getElementById('shipping-amount').innerText) || 0;
      const discount = parseFloat(document.getElementById('discount-amount').innerText) || 0;
      const grandTotal = parseFloat(document.getElementById('grand-total').innerText) || 0;


      document.getElementById('receipt-customer').innerText = customerName;
      document.getElementById('receipt-phone').innerText = customerPhone;
      document.getElementById('receipt-id').innerText = customerId;
      document.getElementById('receipt-contact').innerText = customerPhone;
      document.getElementById('receipt-date').innerText = new Date(customerCreated).toLocaleDateString();
      document.getElementById('receipt-subtotal').innerText = subTotal.toFixed(2);
      document.getElementById('receipt-discount').innerText = discount.toFixed(2);
      document.getElementById('receipt-shipping').innerText = shipping.toFixed(2);
      document.getElementById('receipt-tax').innerText = tax.toFixed(2);
      document.getElementById('receipt-grandtotal').innerText = grandTotal.toFixed(2);
      document.getElementById('receipt-due').innerText = '0.00';
      document.getElementById('receipt-transaction').innerText = data.invoice_number;

      // Show receipt modal
      const receiptModal = new bootstrap.Modal(document.getElementById('print-receipt'));
      receiptModal.show();

      // Prepare order data
const orderData = {
  invoice_number: invoiceNumber,  // This should be passed correctly
  customer_id: customerId,
  customer_name: customerName,
  customer_phone: customerPhone,
  customer_city: customerCity,
  products: products,
  subtotal: subTotal,
  discount: discount,
  shipping: shipping,
  tax: tax,
  grand_total: grandTotal
};

console.log('Order Data:', orderData);  // Log the data before sending

// Send the data to the backend (AJAX request)
fetch("<?php echo base_url('Pointofsales/save_invoice'); ?>", {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
  },
  body: JSON.stringify(orderData)
})
.then(response => response.json())
.then(data => {
  if (data.success) {
    console.log('Invoice saved successfully');
    document.getElementById('receipt-transaction').innerText = data.invoice_number; // Display invoice number in modal
  } else {
    console.error('Error saving invoice:', data.message);
  }
})
.catch(error => console.error('Error:', error));
    });
  }



  // Populate phone and city when customer is selected
  const customerSelect = document.getElementById('customer-select');
  const phoneInput = document.getElementById('customer-phone');
  const cityInput = document.getElementById('customer-city');

  if (customerSelect) {
    customerSelect.addEventListener('change', function () {
      const selectedOption = customerSelect.options[customerSelect.selectedIndex];
      const phone = selectedOption.getAttribute('data-phone');
      const city = selectedOption.getAttribute('data-city');
      const customerId = selectedOption.getAttribute('data-id');
      const customerCreated = selectedOption.getAttribute('data-created');

      phoneInput.value = phone || '';
      cityInput.value = city || '';

      // Optional: Update customer information on selection (for display in receipt or other parts)
      document.getElementById('receipt-id').innerText = customerId || "N/A";
      document.getElementById('receipt-contact').innerText = phone || "N/A";
      document.getElementById('receipt-date').innerText = customerCreated ? new Date(customerCreated).toLocaleDateString() : new Date().toLocaleDateString();
    });
  }
});


//


document.addEventListener("DOMContentLoaded", function () {
  const receivedInput = document.getElementById("received-amount");
  const cashPayInput = document.getElementById("cashpay-total");
  const balanceOutput = document.getElementById("balance-amount");

  function updateBalance() {
    const received = parseFloat(receivedInput.value) || 0;
    const paying = parseFloat(cashPayInput.value) || 0;
    const balance = received - paying;

    balanceOutput.value = balance.toFixed(2);
  }

  receivedInput.addEventListener("input", updateBalance);
});

document.addEventListener("DOMContentLoaded", function () {
    const hash = window.location.hash;
    if (hash) {
        const tabTrigger = document.querySelector(
            `[data-bs-toggle="pill"][data-bs-target="${hash}"],
             [data-bs-toggle="pill"][href="${hash}"]`
        );
        if (tabTrigger) {
            const tab = new bootstrap.Tab(tabTrigger);
            tab.show();
        }
    }
});

const orderData = {
  customer_id: document.getElementById('customer-select')?.value || 0,
  subtotal: parseFloat(document.getElementById('receipt-subtotal').textContent) || 0,
  gst: parseFloat(document.getElementById('receipt-tax').textContent) || 0,
  shipping: parseFloat(document.getElementById('receipt-shipping').textContent) || 0,
  discount: parseFloat(document.getElementById('receipt-discount').textContent) || 0,
  grand_total: parseFloat(document.getElementById('receipt-grandtotal').textContent) || 0,
  products: []
};

document.querySelectorAll('.product-list').forEach(productEl => {
  orderData.products.push({
    id: productEl.dataset.id,
    qty: productEl.querySelector('input[name="qty"]').value
  });
});

fetch('<?= base_url("Pointofsales/paymentComplete") ?>', {
  method: 'POST',
  headers: { 'Content-Type': 'application/json' },
  body: JSON.stringify(orderData)
})
.then(res => res.json())
.then(data => {
  if (data.success) {
    document.getElementById('receipt-transaction').textContent = data.invoice_no;
    document.getElementById('receipt-date').textContent = data.date;
    new bootstrap.Modal(document.getElementById('print-receipt')).show();
    document.getElementById('clear-cart').click();
  } else {
    alert('Payment failed: ' + data.message);
  }
});

//Generate invoice number

function generateInvoiceNumber() {
    const date = new Date();
    const yyyy = date.getFullYear();
    const mm = String(date.getMonth() + 1).padStart(2, '0');
    const dd = String(date.getDate()).padStart(2, '0');
    const randomNum = Math.floor(Math.random() * 9000) + 1000; // Random 4-digit number

    const invoiceNumber = `INV-${yyyy}${mm}${dd}-${randomNum}`;
    console.log('Generated Invoice Number:', invoiceNumber);

    // Set the invoice number in the DOM
    const receiptElement = document.getElementById('receipt-transaction');
    if (receiptElement) {
      receiptElement.textContent = invoiceNumber;
    }

    return invoiceNumber;
  }


function handleSubmit() {
  // Close the current modal (cash payment)
  const cashModal = bootstrap.Modal.getInstance(document.getElementById('payment-cash'));
  cashModal.hide();

  // Wait for the animation to finish, then show payment completed
  setTimeout(() => {
    const completedModal = new bootstrap.Modal(document.getElementById('payment-completed'));
    completedModal.show();
  }, 500); // 500ms delay ensures smooth transition
}

function showReceipt() {
  // Select only rows that have a product name (h6) and price (.total-price)
  const productEls = document.querySelectorAll('.product-wrap > div:has(h6, .total-price)');

  if (productEls.length === 0) {
    document.getElementById('receipt-products').innerHTML = `
      <tr><td colspan="4" class="text-center">No Products Selected</td></tr>
    `;
    return;
  }

  const products = Array.from(productEls)
    .filter(el => el.querySelector('h6') && el.querySelector('.total-price')) // ensure it’s a real product
    .map((el, index) => {
      const name = el.querySelector('h6').innerText.trim();
      const qty = parseFloat(el.querySelector('input[name="qty"]')?.value) || 0;
      const priceText = el.querySelector('.total-price').innerText.replace(/[^\d.]/g, '');
      const price = parseFloat(priceText) || 0;

      return `
        <tr>
          <td>${index + 1}. ${name}</td>
          <td>₹${price.toFixed(2)}</td>
          <td>${qty}</td>
          <td class="text-end">₹${(qty * price).toFixed(2)}</td>
        </tr>
      `;
    })
    .join('');

  document.getElementById('receipt-products').innerHTML = products;

  // Fill totals
  document.getElementById('receipt-subtotal').innerText = document.getElementById('sub-total').innerText;
  document.getElementById('receipt-discount').innerText = document.getElementById('discount-amount').innerText;
  document.getElementById('receipt-shipping').innerText = document.getElementById('shipping-amount').innerText;
  document.getElementById('receipt-tax').innerText = document.getElementById('gst-amount').innerText;
  document.getElementById('receipt-grandtotal').innerText = document.getElementById('grand-total').innerText;

  // Fill customer info
  const customerSelect = document.getElementById('customer-select');
  document.getElementById('receipt-customer').innerText = customerSelect.selectedOptions[0]?.text || '';
  document.getElementById('receipt-id').innerText = customerSelect.value || '';
  document.getElementById('receipt-contact').innerText = document.getElementById('customer-phone').value || '';
  document.getElementById('receipt-date').innerText = new Date().toLocaleString();

  // Show modal
  const printModal = new bootstrap.Modal(document.getElementById('print-receipt'));
  printModal.show();
}

// payment and save db
function saveOrderFromReceipt() {
    const order = {
        customer_id: document.getElementById('receipt-id').innerText.trim() || 0,
        customer_name: document.getElementById('receipt-customer').innerText.trim() || 'Walk-in',
        phone: document.getElementById('receipt-phone').innerText.trim(),
        contact: document.getElementById('receipt-contact').innerText.trim(),
        date: document.getElementById('receipt-date').innerText.trim(),
        subtotal: parseFloat(document.getElementById('receipt-subtotal').innerText) || 0,
        discount: parseFloat(document.getElementById('receipt-discount').innerText) || 0,
        shipping: parseFloat(document.getElementById('receipt-shipping').innerText) || 0,
        tax: parseFloat(document.getElementById('receipt-tax').innerText) || 0,
        grand_total: parseFloat(document.getElementById('receipt-grandtotal').innerText) || 0,
        invoice_number: document.getElementById('receipt-transaction').innerText.replace('#', '').trim()
    };

    const rows = document.querySelectorAll('#receipt-products tr');
    const items = [];

    rows.forEach(row => {
        const cols = row.querySelectorAll('td');
        if (cols.length === 4) {
            items.push({
                product_name: cols[0].innerText.replace(/^\d+\.\s*/, ''),
                price: parseFloat(cols[1].innerText.replace(/[^\d.]/g, '')) || 0,
                quantity: parseInt(cols[2].innerText) || 0,
                total: parseFloat(cols[3].innerText.replace(/[^\d.]/g, '')) || 0
            });
        }
    });

    if (!items.length) {
        alert("No products to save!");
        return;
    }

    fetch(saveOrderUrl, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ order: order, items: items })
    })
    .then(res => res.json())
    .then(data => {
        console.log("Save Response:", data);
        if (data.status === 'success') {
            // ✅ Show receipt modal first
            const receiptModal = new bootstrap.Modal(document.getElementById('receiptModal'));
            receiptModal.show();

            // ✅ Attach a click handler to print AFTER modal is shown
            document.getElementById('printReceiptBtn').onclick = function() {
                printReceipt();
            };
        } else {
            alert("Error: " + data.message);
        }
    })
    .catch(err => console.error("Fetch Error:", err));
}




// function handleReceipt() {
//     const orderId = generateInvoiceNumber(); // should return actual DB order id
//     showReceipt();
//     printAndSaveOrder(orderId);
// }




//Print receipt

  function printReceipt() {
    const printContents = document.getElementById('print-section').innerHTML;
    const originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    window.location.reload(); // reload page to restore JS and UI
  }