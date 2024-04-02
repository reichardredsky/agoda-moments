export default class Dropdown {
  constructor(selector, options = { callback: (item) => {} }) {
    this.dropdown = document.querySelector(selector);
    if (!this.dropdown) return console.warn(`The dropdown query selector of ${selector} not found in this page`);
    this.trigger = this.dropdown.querySelector('.dropdown-trigger');
    this.menu = this.dropdown.querySelector('.dropdown-menu');
    this.menuItems = this.menu.querySelectorAll('ul li a');
    this.isOpen = false;
    this.callback = options.callback;

    this.menuItems.forEach(item => {
      item.addEventListener('click', this.onItemSelect.bind(this));
    });

    this.trigger.addEventListener('click', this.toggle.bind(this));
    document.addEventListener('click', this.close.bind(this));
  }

  itemClick() {
    this.isOpen = false;
    this.menu.classList.remove('open');
  }

  onItemSelect(event) {
    event.preventDefault();
    var value = this.trigger.querySelector('value');
    value.innerText = event.target.innerText;
    this.itemClick();
    this.callback(event.target.innerText);
  }

  toggle() {
    this.isOpen = !this.isOpen;
    this.menu.classList.toggle('open');
  }

  close(event) {
    if (!this.dropdown.contains(event.target)) {
      this.isOpen = false;
      this.menu.classList.remove('open');
    }
  }
}

// const dropdown = new Dropdown('.dropdown');