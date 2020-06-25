<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>VIEW PDF</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  
  <script src="/js/pdf.js"></script>

  <script>
    console.log(window.location.href);
  </script>
  <style>

    #the-canvas {
        border: 1px solid black;
        direction: ltr; 
    }

   
  </style>


</head>
<body>

  <div class="container">
    
    <h1>{{ $thesis->thesistitle }}</h1>
    <h4>{{ $thesis->thesisdesc }}</h4>

    <div class="row">
      <div class="col">
        <div>
          <button id="prev" class="btn btn-info btn-sm mb-2">Previous</button>
          <button id="next" class="btn btn-info btn-sm mb-2">Next</button>
         
          

        
            <button id="zoomin" class="btn btn-info btn-sm mb-2">Zoom In</button>
            <button id="zoomout" class="btn btn-info btn-sm mb-2">Zoom Out</button>
            <button id="zoomout" class="btn btn-success btn-sm mb-2" onclick="window.location = '/client/home'">BACK HOME</button>
          <div>
            <span>Page: <span id="page_num"></span> / <span id="page_count"></span></span>
          </div>
        </div>

        <canvas id="the-canvas"></canvas>

      </div>
    </div>

  </div>
  
</body>
</html>




<script>
    // If absolute URL from the remote server is provided, configure the CORS
// header on that server.
var url = '/{{ $pdfurl }}';

// Loaded via <script> tag, create shortcut to access PDF.js exports.
var pdfjsLib = window['pdfjs-dist/build/pdf'];

// The workerSrc property shall be specified.
pdfjsLib.GlobalWorkerOptions.workerSrc = '/js/pdf.worker.js';

var pdfDoc = null,
    pageNum = 1,
    pageRendering = false,
    pageNumPending = null,
    scale = 0.9,
    canvas = document.getElementById('the-canvas'),
    ctx = canvas.getContext('2d');

/**
 * Get page info from document, resize canvas accordingly, and render page.
 * @param num Page number.
 */
function renderPage(num) {
  pageRendering = true;
  // Using promise to fetch the page
  pdfDoc.getPage(num).then(function(page) {
    var viewport = page.getViewport({scale: scale});
    canvas.height = viewport.height;
    canvas.width = viewport.width;

    // Render PDF page into canvas context
    var renderContext = {
      canvasContext: ctx,
      viewport: viewport
    };
    var renderTask = page.render(renderContext);

    // Wait for rendering to finish
    renderTask.promise.then(function() {
      pageRendering = false;
      if (pageNumPending !== null) {
        // New page rendering is pending
        renderPage(pageNumPending);
        pageNumPending = null;
      }
    });
  });

  // Update page counters
  document.getElementById('page_num').textContent = num;
}

/**
 * If another page rendering in progress, waits until the rendering is
 * finised. Otherwise, executes rendering immediately.
 */
function queueRenderPage(num) {
  if (pageRendering) {
    pageNumPending = num;
  } else {
    renderPage(num);
  }
}

/**
 * Displays previous page.
 */
function onPrevPage() {

  if (pageNum <= 5) {
    canvas.style.filter = 'none';
  }

  if (pageNum <= 1) {
    return;
  }
  pageNum--;
  queueRenderPage(pageNum);
}
document.getElementById('prev').addEventListener('click', onPrevPage);

/**
 * Displays next page.
 */
function onNextPage() {
  if (pageNum >= 4) {
    canvas.style.filter = 'blur(5px)';
  }

  if (pageNum >= pdfDoc.numPages) {
    return;
  }
  pageNum++;
  queueRenderPage(pageNum);
}
document.getElementById('next').addEventListener('click', onNextPage);

/**
 * Asynchronously downloads PDF.
 */
pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
  pdfDoc = pdfDoc_;
  document.getElementById('page_count').textContent = pdfDoc.numPages;

  // Initial/first page rendering
  renderPage(pageNum);


  document.getElementById('zoomin').addEventListener('click', onZoomIn);
  document.getElementById('zoomout').addEventListener('click', onZoomOut);

  function onZoomIn(){
    scale = scale + .1;
    console.log(scale);
    queueRenderPage(pageNum);
  }

  function onZoomOut(){
    scale = scale - .1;
    console.log(scale);
    queueRenderPage(pageNum);
  }

});

</script>