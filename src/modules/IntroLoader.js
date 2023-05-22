class IntroLoader {

    constructor() {
      this.events()
    }
  
    events() {
      this.loadPage()
    }

    loadPage() {
        const loader = document.getElementById('intro-loader');

        setTimeout(() => {
          this.introAnimation(0, 100, 3000);

          setTimeout(() => {
            loader.classList.add('fade-out');
            setTimeout(() => {
              loader.remove();
            }, 500);
          }, 3000);

        }, 1200);

    }

    introAnimation(start, end, duration) {
      let startTimestamp = null;
      const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        const loader1 = document.getElementById("loading-counter-1");
        const loader2 = document.getElementById("loading-counter-2");
        const loaderTransition = document.getElementById("loader-transition");

        loader1.innerHTML = Math.floor(progress * (end - start) + start) + '%';
        loader2.innerHTML = Math.floor(progress * (end - start) + start) + '%';
        loaderTransition.style.width = Math.floor(progress * (end - start) + start) + 'vw';

        if (progress < 1) {
          window.requestAnimationFrame(step);
        }
      };
      window.requestAnimationFrame(step);
    }
    
    
}
  
export default IntroLoader

  