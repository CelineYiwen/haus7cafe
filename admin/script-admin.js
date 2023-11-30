
// Select all side menu items in the top section of the sidebar
const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

// Add click event listeners to each side menu item
allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {

		// Remove 'active' class from all side menu items
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})

		// Add 'active' class to the clicked side menu item
		li.classList.add('active');
	})
});



// TOGGLE SIDEBAR visibility
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})


// Handle search button and form interactions
const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {

	// Toggle search form visibility on small screens
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');

		// Toggle search button icon
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})


// Initial setup based on window width
if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}

// Adjustments on window resize
window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})


/* Table JS Start */
// Code for handling iOS-specific issues related to the table
if (/(iPhone|iPad|iPod)/gi.test(navigator.userAgent) && window.location.pathname.indexOf('/full') > -1) {
  var p = document.createElement('p');
  p.innerHTML = '<a target="_blank" href="https://s.codepen.io/dbushell/debug/wGaamR"><b>Click here to view this demo properly on iOS devices (remove the top frame)</b></a>';
  document.body.insertBefore(p, document.body.querySelector('h1'));
}
/* Table JS End */


/* Notification */
// Function to toggle the notification menu
function menuToggle() {
	const toggleMenu = document.querySelector('.notif_menu');
	toggleMenu.classList.toggle('active')
}