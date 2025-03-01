<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legal Website - Stylish Sidebar with Active State</title>
    <!-- MDBootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/mdb-ui-kit@6.4.0/css/mdb.min.css" rel="stylesheet">
    <!-- Font Awesome (for icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, #4b6cb7, #182848);
            box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);
            padding-top: 20px;
        }

        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            font-size: 16px;
            color: #ffffff;
            display: block;
            transition: all 0.3s ease;
        }

        .sidebar a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            padding-left: 25px;
        }

        .sidebar a.active {
            background-color: rgba(255, 255, 255, 0.2);
            border-left: 4px solid #ffffff;
            padding-left: 25px;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        .content {
            margin-left: 250px;
            padding: 30px;
        }

        .content h1 {
            color: #4b6cb7;
            font-weight: bold;
        }

        .content p {
            color: #555;
            line-height: 1.8;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <!-- <div class="sidebar">
        <a href="{{ route('add-team-member') }}" class="active">
            <i class="fas fa-user-plus"></i> Add New Team Member
        </a>
        <a href="#add-research">
            <i class="fas fa-search"></i> Add New Research
        </a>
        <a href="#add-vlog">
            <i class="fas fa-video"></i> Add New Vlog
        </a>
        <a href="#add-photo">
            <i class="fas fa-image"></i> Add New Photo
        </a>
    </div> -->

    <body>
        <div class="container">
            <div class="sidebar">
                <a href="{{ route('add-team-member') }}" class="">Add New Team Member</a>
                <a href="{{ route('add-research') }}">Add New Research</a>
                <a href="{{ route('add-vlog') }}">Add New Vlog</a>
                <a href="{{ route('add-photo') }}">Add New Photo</a>
            </div>

            <!-- Optionally, if you want a dedicated area for AJAX-loaded content,
         you can use a separate container with an id. Otherwise, use the main content area. -->
            <div id="content">
                <!-- This container can be used if you decide to load content here. -->
            </div>
        </div>

        <!-- Main Content Area that will be replaced -->
        <div class="content">
            <h1>Welcome to Your Legal Website</h1>
            <p>
                This is the main content area. You can add your legal content here, such as articles, case studies, or client information.
                The sidebar on the left provides quick access to important actions like adding team members, research, vlogs, and photos.
            </p>
        </div>

        <!-- MDBootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/mdb-ui-kit@6.4.0/js/mdb.min.js"></script>
        <!-- jQuery (ensure it's loaded before using it) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
        <!-- Custom JS for Active State and AJAX content loading -->
        <script>
            // Add active state to the clicked menu item
            const sidebarLinks = document.querySelectorAll('.sidebar a');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function() {
                    // Remove active class from all links
                    sidebarLinks.forEach(link => link.classList.remove('active'));
                    // Add active class to the clicked link
                    this.classList.add('active');
                });
            });

            // AJAX-based content loading for sidebar links
            $(document).on('click', '.sidebar a', function(e) {
                e.preventDefault(); // Prevent default link behavior
                var url = $(this).attr('href');

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        // Update the main content area with the returned HTML
                        $('.content').html(response);
                    },
                    error: function(xhr) {
                        console.error("Error loading content:", xhr);
                    }
                });
            });
        </script>
    </body>

</html>