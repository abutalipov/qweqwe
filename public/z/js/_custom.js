// document.addEventListener("DOMContentLoaded", function() {

// 	// Custom JS

// });

$(function() {

	function tab(e) {
		let nav = e.find('.p-table__nav')

		nav.on('click', '.p-table__tab:not(.p-table__tab_active)', function(){
			let index = $(this).index();
			$(this)
				.addClass('p-table__tab_active').siblings().removeClass('p-table__tab_active')
				e.find('.p-table__content-item').eq(index).addClass('p-table__content-item_active').siblings().removeClass('p-table__content-item_active')
		});
	} 

	tab($('#table-skill'));
	tab($('#table-post'));

	if ($('div').is('#table-dialog')) {
		tab($('#table-dialog'));
	}

	function more(e, parent){
		e.click(function(){
			parent.find('.list-me_hidden').slideToggle();

			e.text() == 'See more' ? e.text('Hide detailed information') : e.text('See more');
			e.toggleClass('about-me__more_active')

			parent.find('.rating-skill').toggle();
			parent.find('#about-rat-list').toggle();
		});
	}

	more($('#about-more'), $('#aboutme'));

	function inputPost(e) {
		e.keyup(function(){
			let inp = $(this);

			inp.css({'height': this.scrollHeight + 'px'})
			console.log(this.scrollHeight);
			
			if (this.scrollHeight > 70) {
				inp.parent().addClass('write-post_full')
			} else {
				if (inp.parent().hasClass('write-post_full')) {
					inp.parent().removeClass('write-post_full')
				}
			}
		})
	}

	inputPost($('#writepost'));

	function menuProfile(){
		$('.profile-head__info').click(function(){
			$(this).toggleClass('profile-head__info_active');
		});
	}

	menuProfile();

	function searchInp(){
		$('.search-head__input').keyup(function(){
			if ($(this).val().length > 3) {
				$('.search-head').addClass('search-head_active');
			} else {
				$('.search-head').removeClass('search-head_active');
			}			
		});
	}

	searchInp();

	function inputSearchPost() {
		$('.p-table-search__input').click(function(){
			$('#table-post .p-table__nav').addClass('p-table__nav_search');
		});
	}

	inputSearchPost();

	function mobileMenu(e) {
		// let top = $('.header').height();
		let ctn = e.find('.mobile-menu__content');

		e.find('.mobile-menu__btn').click(function(){
			// let scroll = window.pageYOffset;
			$('body').toggleClass('body-hidden');

			// if (scroll > top) {
			// 	ctn.css({'top' : '0px'});
			// } else if (scroll == 0) {
			// 	ctn.css({'top' : top + 'px'});
			// } else {
			// 	let sum = top - scroll;
			// 	ctn.css({'top' : sum + 'px'});
			// }

			ctn.toggle()
			// console.log('scroll', scroll);
		});

		
	}

	mobileMenu($('.mobile-menu'));

	function seeAboutMobile() {
		$('.p-mobile__see').click(function(){
			$(this).text() == 'See more' ? $(this).text('Hide detailed information') : $(this).text('See more');

			$('.profile-head__name').toggleClass('profile-head__name_back');
			$('.p-mobile__col').toggleClass('p-mobile__col_active');
			$('.p-mobile__about').toggle();
			$('.p-mobile__share').toggle();
			$('.p-mobile__rating').toggle();
			$('.myskill-mobile').toggle();
			$('.about-mobile').toggle();
		});


	}
	seeAboutMobile();



});
