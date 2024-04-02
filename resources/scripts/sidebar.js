const SideBar  = () => {
    const sidebar = document.querySelector('#sidebar');
    const sideBarToggle = document.querySelector('.sidebar-toggle');
    const body = document.querySelector('#app');
    let toggle = false;

    const onToggle = () => {
        toggle = !toggle;
        if (toggle) {
            body.classList.add('tw-transition-transform', 'tw-duration-300');
            body.style.transform = 'translate3d(80vw,0,0)';
            document.body.classList.add('tw-overflow-hidden');
            document.querySelector('#app').classList.add('tw-shadow-lg');
        } else {
            body.style.transform = '';
            document.body.classList.remove('tw-overflow-hidden');
            document.querySelector('#app').classList.remove('tw-shadow-lg');
        }
    };

    sideBarToggle.addEventListener('click', onToggle);
    body.addEventListener('click', (e) => {
        if (toggle && e.target.id !== 'sidebar' && e.target.id !== 'sidebar-toggle') {
            onToggle();
        }
    });
    // document.querySelector('#app').addEventListener('click', onToggle);

    // sideBarClose.addEventListener('click', () => {
    //     sideBar.classList.remove('active');
    // });
}

export default SideBar;