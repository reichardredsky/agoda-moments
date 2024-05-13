const AgodaSwiper = (
  className = '',
  parameters = {}
) => {

  const getColumnGap = (element) => {
      const gap = parseInt(window.getComputedStyle(element).columnGap);
      return isNaN(gap) ? 0 : gap;
  }

  const getParentExactWidth = (element) => {
      const parentWidth = parseInt(window.getComputedStyle(element).width);
      // const parentPadding = parseInt(window.getComputedStyle(element).paddingLeft) + parseInt(window.getComputedStyle(element).paddingRight);
      return parentWidth;
  }

  let _parameters = parameters;
  
  const init = () => {
      var parentWrap = document.querySelector(`${className}`);

      if (parentWrap === null) return;

      parentWrap.style.overflow = 'hidden';
      var scrollWrapper = document.querySelector(`${className} ${_parameters.wrapperClass}`);
      scrollWrapper.style.transition = `transform 0.5s ease`;
      var slides = document.querySelectorAll(`${className} ${_parameters.wrapperClass} > div`);

      var itemWidth = (getParentExactWidth(parentWrap) / _parameters?.slidesPerView)-getColumnGap(scrollWrapper);
      console.log(_parameters?.slidesPerView > slides.length);
      var numberOfPages =  (_parameters?.slidesPerView < slides.length) ? slides.length - _parameters?.slidesPerView : 0;
      let pageCounter = 0;
      var nextButton = document.querySelector(`${className} .agoda-swiper-next`) ?? document.createElement('div');
      var prevButton = document.querySelector(`${className} .agoda-swiper-prev`) ?? document.createElement('div');

      slides.forEach(slide => {
          slide.style.flex = `0 0 ${itemWidth}px`;
      });

      scrollWrapper.style.transform = `translateX(5px)`;

      console.log('numberOfPages ', numberOfPages);

      if (numberOfPages >= 1) {
          nextButton.style.display = 'flex';
      } 
      else if (pageCounter === numberOfPages) {
          nextButton.style.display = 'none';
      } else {
          prevButton.style.display = 'none';
      }

      const next = () => {
          if (pageCounter < numberOfPages) {
              prevButton.style.display = 'flex';
              pageCounter++;
          } 
          
          if(pageCounter === numberOfPages) {
              nextButton.style.display = 'none';
          }

          scrollWrapper.style.transform = `translateX(calc(-${pageCounter * (itemWidth + getColumnGap(scrollWrapper))}px + 5px))`;
      }
  
      const prev = () => {
          
          if (pageCounter > 0) {
              nextButton.style.display = 'flex';
              pageCounter--;
              scrollWrapper.style.transform = `translateX(calc(-${pageCounter * (itemWidth + getColumnGap(scrollWrapper))}px + 5px))`;
          } 
          
          if (pageCounter < 1) {
              scrollWrapper.style.transform = `translateX(5px)`;
              prevButton.style.display = 'none';
          }
  
      }

      nextButton.addEventListener('click', () => {
          next();
      });
      
      prevButton.addEventListener('click', () => {
          prev();
      });
  }


  function findMatchingBreakpoint() {
      const sortedBreakpoints = Object.keys(parameters?.breakpoints ?? {})
          .map(bp => parseInt(bp, 10))
          .sort((a, b) => b - a);
  
      let matchingBreakpoint = null;

      for (let i = 0; i < sortedBreakpoints.length; i++) {
        let windowScreen = window.innerWidth > window.screen.width ? window.screen.width : window.innerWidth;
          if (windowScreen < sortedBreakpoints[i]) {
              matchingBreakpoint = sortedBreakpoints[i];
          } else {
              break;
          }
      }
  
      if (matchingBreakpoint !== null) {
          _parameters = {..._parameters, ...parameters.breakpoints[matchingBreakpoint]};
      } else {
          _parameters = parameters;
      }

      init();
     
  }
  
  window.addEventListener("resize", findMatchingBreakpoint);

  findMatchingBreakpoint();
  
  return {
      init,
      _parameters
  }
  
}

export default AgodaSwiper;