document.addEventListener("DOMContentLoaded", function() {
  
  const articleWithBootstrap = document.querySelector('article.Bootstrap');

  if (articleWithBootstrap) {
    
    const bootstrapCSS = document.createElement('link');
    bootstrapCSS.href = 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css';
    bootstrapCSS.rel = 'stylesheet';
    document.head.appendChild(bootstrapCSS);


    const bootstrapJS = document.createElement('script');
    bootstrapJS.src = 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js';
    document.body.appendChild(bootstrapJS);

    const targetDivs = articleWithBootstrap.querySelectorAll('div');
    targetDivs.forEach(div => {
      div.classList.add('container');
    });

  }
});