<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>APK Upload</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap & Toastr CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background: #f4f6f9;
    }
    .upload-card {
      max-width: 500px;
      margin: auto;
      margin-top: 80px;
      border-radius: 15px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }
    .upload-icon {
      font-size: 50px;
      color: #0d6efd;
    }
  </style>
</head>
<body>

  <div class="card upload-card p-4">
    <div class="text-center mb-3">
      <i class="fa-solid fa-cloud-arrow-up upload-icon"></i>
      <h4 class="mt-3">Upload APK File</h4>
      <p class="text-muted">Only .apk files are allowed</p>
    </div>

    <form id="uploadForm" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="apkFile" class="form-label">Choose APK File</label>
        <input type="file" class="form-control" name="apkFile" id="apkFile" accept=".apk" required>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">
          <i class="fa-solid fa-upload me-1"></i> Upload
        </button>
      </div>
    </form>
  </div>

  <!-- JS Libraries -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>

  <script>
    toastr.options = {
      "closeButton": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "timeOut": "3000"
    };

    $(document).ready(function () {
      $('#uploadForm').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
          url: 'upload_post.php',
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
            if (response.status === 'success') {
              toastr.success(response.message);
              $('#uploadForm')[0].reset(); // Clear form
            } else {
              toastr.error(response.message || 'Upload failed');
            }
          },
          error: function () {
            toastr.error('Something went wrong!');
          }
        });
      });
    });
  </script>

</body>
</html>
