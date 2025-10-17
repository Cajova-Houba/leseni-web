const IMAGE_MODAL_ID = "imageModal";
const GALLERY_CONTAINER_ID = "galleryContainer";

const GALLERY_IMAGE_COUNT = 16;
const GALLERY_IMAGES_PER_ROW = 4;

// init modal window in refs page
const imageModal = document.getElementById(IMAGE_MODAL_ID)

// add event listener
if (imageModal) {
    imageModal.addEventListener('show.bs.modal', event => {
        // Element that triggered the modal
        const triggerElement = event.relatedTarget
        // Extract info from data-bs-* attributes
        const imgSource = triggerElement.getAttribute('data-bs-src')
        // If necessary, you could initiate an Ajax request here
        // and then do the updating in a callback.

        // Update the modal's content.
        const modalImageElement = imageModal.querySelector("#imageModalDisplay")
        modalImageElement.src = imgSource
  })
}