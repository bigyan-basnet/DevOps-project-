function toggleMenu() {
  const middleMenuGroup = document.querySelector('.middle-menu-group');
  const lastMenuGroup = document.querySelector('.last-menu-group');
  const menubarGroup = document.querySelector('.menu-logo')

  if (middleMenuGroup.style.display === 'none') {
    middleMenuGroup.style.display = 'flex';
    lastMenuGroup.style.display = 'flex';
    middleMenuGroup.style.flexDirection = 'column';
    lastMenuGroup.style.flexDirection = 'column';
    menubarGroup.style.display = 'none';
  } else {
    middleMenuGroup.style.display = 'none';
    lastMenuGroup.style.display = 'none';
  }
}
