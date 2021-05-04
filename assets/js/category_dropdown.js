const allSubMenus = document.querySelectorAll('.category-select .menu-item-has-children .sub-menu'); // get all submenus

document.addEventListener('click', toggleDropdown);

function toggleDropdown(event) {
	const dropdownMenuContainer = event.target.parentElement; // get parent element of clicked item

	const submenu = dropdownMenuContainer.querySelector('.sub-menu'); // from parent, get the submenu

	if (dropdownMenuContainer.classList.contains('menu-item-has-children')) {
		submenu.classList.toggle('opened'); // toggle open class on selected dropdown

		// check if the clicked submenu is equal to the specific sub-item. If not, remove opened (so that no 2 dropdowns can be open at the same time)
		allSubMenus.forEach((menuItem) => {
			if (submenu !== menuItem) {
				menuItem.classList.remove('opened');
			}
		});
	} else {
		// When the target is not a submenu, remove opened class (click away from submenu to close)
		allSubMenus.forEach((menuItem) => {
			menuItem.classList.remove('opened');
		});
	}
}
