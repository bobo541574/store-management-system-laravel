<!DOCTYPE html>
<html lang="en">

<head>

    {{-- meta-tags --}}
    @include('backend.templates.meta-tags')

    <title>{{ config('app.name', 'Inventory Management System') }}</title>

    {{-- styles --}}
    @include('backend.templates.styles')

    @stack('styles')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('backend.templates.sidebar')
        
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
        
                <!-- Topbar -->
                @include('backend.templates.header')
                <!-- End of Topbar -->
        
                <!-- Begin Page Content -->
                <div class="container-fluid">
        
                    <!-- Page Heading -->
                    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div> --}}
                    
                    @yield('content')

                            
                </div>
                <!-- /.container-fluid -->
        
            </div>
            <!-- End of Main Content -->
        
            <!-- Footer -->
            @include('backend.templates.footer')
            <!-- End of Footer -->
        
        </div>


        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    @include('backend.templates.scroll')
    

    <!-- Logout Modal-->
    @include('backend.templates.modal')
    

    {{-- scripts --}}
    @include('backend.templates.scripts')

    @stack('scripts')
        
</body>

</html>