class PostValidation {
    
    PostValidation(InsertImageBtn) {
        this.ImageInput = document.querySelector('.dz-hidden-input');
                this.InsertImageBtn = document.querySelector('div[title="Insert Image"]');
                let dropZone = document.getElementById('22vwdropzone');

                this.InsertImageBtn.onclick = () => {
                    if(!this.checkImageExist()) {
                        dropZone.click();
                    } 
                }

                this.appendOnFileChangeEvent();
    }

    appendOnFileChangeEvent() {
        let input = document.querySelector('.dz-hidden-input');
        input.onchange = () => {
        
            if(this.checkImageExist()) {
                console.log('Already uploaded image!');
                alert('HEY');
            }
            
            else {
                this.post.image = input.files[0];
                input.value = '';
            }
            console.log(this.post.image)
        
        }
    }
    checkImageExist() {
        let reg = new RegExp(/<img [^>]*src="[^"]*"[^>]*>/gmi);
        let match = reg.exec(this.post.html);
        
        if (match) {
            this.InsertImageBtn.style.visibility = 'hidden';
            return true;
        }
        else {
            this.InsertImageBtn.style.visibility = 'visible';
            this.post.image = null;
            this.appendOnFileChangeEvent();
            return false;
        }
}