<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Lešení levně a rychle</title>
    <meta name="description" content="Short description of the page" />

    <!-- Bootstrap CSS (latest 5.x) -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />

    <link href="assets/css/main-bootstrap.css" rel="stylesheet" />
  </head>
  <body>
    <header class="container">
        <div class="row">
            <div class="d-flex col-md-12 col-lg-12 justify-content-center">
                <img src="images/logo/wide-black-transparent.png" alt="Lešení levně a rychle" class="img-fluid" style="max-height: 300px;"/>
            </div>
        </div>
    </header>

    <div class="container">
        <nav class="navbar navbar-expand-md navbar-dark bg-main-dark-2 mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                  <img src="images/logo/wide-white-transparent.png" alt="" height="60">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0 font-orange">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.html">O nás</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="service.html">Nabídka</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="refs.php">Reference</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Kontakt</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="metal.html">Kovovýroba</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="modal fade" id="imageModal" tabindex="-1" aria-label="Náhled" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-lg bg-white">
        <div class="modal-content">
          <div class="modal-body">
            <div class="container-fluid">
              <div class="d-flex justify-content-end">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="d-flex justify-content-center">
                <img id="imageModalDisplay" class="img-fluid" src="images/logo/black-transparent.png">
              </div>
            </div>
          </div>
        </div>
      </div>      
    </div>

    </div>

    <main class="container">
      <div class="p-5 mb-4">
        <div class="container-fluid">
          <h2 class="display-6 fw-semibold">Reference</h2>
          
          <div id="galleryContainer">
            <?php include __DIR__ . '/gallery_images.php'; ?>
          </div>
        </div>
      </div>
    </main>

    <div class="container">
        <footer class="p-5 py-4 text-muted bg-main-light">
            <ul class="nav justify-content-center">
                <li class="nav-item pe-5 pb-1">Patrik Huňady</li>
                <li class="nav-item pe-5 pb-1">tel: +420 733 102 070</li>
                <li class="nav-item pe-5 pb-1">mail: lesenilevnearychle@seznam.cz</li>
                <li class="nav-item pe-5 pb-1">&copy; 2025 Lešení levně a rychle</li>
            </ul>
        </footer>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>

    <script src="assets/js/refs.js"></script>
  </body>
</html>
