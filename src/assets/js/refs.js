// init modal window in refs page
const imageModal = document.getElementById("imageModal")

// add event listener
if (imageModal) {
    imageModal.addEventListener('show.bs.modal', event => {
        // Element that triggered the modal
        const triggerElement = event.relatedTarget
        // Extract info from data-bs-* attributes
        const imgSource = triggerElement.getAttribute('src')
        // If necessary, you could initiate an Ajax request here
        // and then do the updating in a callback.

        // Update the modal's content.
        const modalImageElement = imageModal.querySelector("#imageModalDisplay")
        modalImageElement.src = imgSource
  })
}
