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

// auto-populate galery
// const galleryContainer = document.getElementById(GALLERY_CONTAINER_ID)
// if (galleryContainer) {
//   const rowCount = Math.ceil((1.0 * GALLERY_IMAGE_COUNT) / GALLERY_IMAGES_PER_ROW);

//   let imageId = 1;
//   let galleryContainerHtml = "";
//   for (let rowId = 0; rowId < rowCount; rowId++) {
//     galleryContainerHtml += "<div class=\"row justify-content-center\">" ;
//     for (let rowImageId = 0; rowImageId < GALLERY_IMAGES_PER_ROW; rowImageId++) {

//         if (imageId > GALLERY_IMAGE_COUNT) {

//           // fill empty space
//           galleryContainerHtml += "<div class=\"col-lg-3 col-md-6 pb-4\"></div>";
//         } else {
//           // display image

//           // image name with leading zero
//           const imageName = imageId < 10 ? "0" + imageId + ".jpeg" : imageId + ".jpeg";
  
//           galleryContainerHtml += `
//             <div class="col-lg-3 col-md-6 pb-4">
//               <img src="images/thumbnails/${imageName}" class="img-thumbnail" data-bs-src="images/gallery/${imageName}" data-bs-toggle="modal" data-bs-target="#imageModal">
//             </div>
//           `
//         }

//         imageId += 1;
//     }
//     galleryContainerHtml += "</div>";
//   }

//   galleryContainer.innerHTML = galleryContainerHtml;
// }