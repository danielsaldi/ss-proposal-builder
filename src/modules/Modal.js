class Modal {

    constructor() {
      this.modalTrigger = document.getElementsByClassName("js-modalTrigger")
      this.modalClose = document.getElementsByClassName("js-closeModal")
      this.modalOverlay = document.getElementsByClassName("js-closeModalOverlay")
      this.events()
    }
  
    events() {
        Array.from(this.modalTrigger).forEach(elem => {
            elem.addEventListener('click', (e) => {
                e.stopPropagation();
                e.preventDefault();
                var obj = document.querySelector( elem.getAttribute('href') );
                var vnoscroll = true;

                if ( obj ) {
                    this.openModal(obj, vnoscroll);
                    this.escHandler(obj);
                }
            });
        });

         Array.from(this.modalClose).forEach(elem => {
            elem.addEventListener('click', (e) => {
                e.stopPropagation();
                e.preventDefault();
                
                this.closeModal( elem.closest('.modal' ) );
            });
        });

         Array.from(this.modalOverlay).forEach(elem => {
            elem.addEventListener('click', (e) => {
                e.stopPropagation();
                e.preventDefault();
                
                this.closeModal( elem.closest('.modal' ) );
            });
        });
    }

    openModal( obj, vnoscroll ) {

        document.body.append(obj);

        setTimeout(function() {
            obj.classList.add('is-active');
            document.body.classList.add('modal-is-active');
            setTimeout(function() {
                obj.querySelector('.modal__dialog').classList.add('dialog-is-active');
            }, 100);
        }, 100);

        if ( vnoscroll ) {
            document.body.classList.add('v-noscroll'); 
        }
    }

    escHandler( target ) {
        document.addEventListener('keyup.modalListener', function(e) {
            if ( e.which == 27 ) {
                _closeModal( target );
            }
        });
    }

    closeModal( obj ) {
        obj.querySelector('.modal__dialog').classList.remove('dialog-is-active');

        setTimeout(function() {
            obj.classList.remove( 'is-active');
            setTimeout(function() {
                document.body.classList.remove('v-noscroll').classList.remove('modal-is-active');
            }, 500);
        }, 300);

        document.removeEventListener('keyup.modalListener');
    }
    
    
}
  
export default Modal