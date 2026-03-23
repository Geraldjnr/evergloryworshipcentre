@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')

<div class="container py-4">
    <div class="dashboard">

        <!-- Sidebar -->
        <div class="sidebar">
            <h4 class="text-dark text-start mb-4">Admin Panel</h4>

            <ul>
                <li onclick="showSection('visitors')">
                    <i class="bi bi-people"></i> Visitors
                </li>
                <li onclick="showSection('admins')">
                    <i class="bi bi-person-badge"></i> Admins
                </li>
                <li onclick="showSection('teachings')">
                    <i class="bi bi-camera-video"></i> Teachings
                </li>
            </ul>
        </div>

        <!-- Content -->
        <div class="content p-4">

            <!-- VISITORS -->
            <div id="visitors" class="section">
                <h3>Visitors</h3>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Location</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($visitors as $visitor)
                        <tr>
                            <td>{{ $visitor->name }}</td>
                            <td>{{ $visitor->email }}</td>
                            <td>{{ $visitor->location }}</td>
                            <td>{{ $visitor->phone }}</td>
                            <td>
                                <i class="bi bi-eye text-primary me-2"></i>
                                <i class="bi bi-trash text-danger"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- ADMINS -->
            <div id="admins" class="section d-none">
                <div class="d-flex justify-content-between mb-3">
                    <h3>Admins</h3>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adminModal">
                        + Add Admin
                    </button>
                </div>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($admins as $admin)
                        <tr>
                            <td>
                                @if($admin->profile_image)
                                <img src="{{ asset('uploads/admins/'.$admin->profile_image) }}" alt="Profile" width="50" height="50" class="rounded-circle">
                                @else
                                <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i>
                                @endif
                            </td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>
                                <!-- Edit / Delete -->
                                <i class="bi bi-pencil text-warning me-2"></i>
                                <i class="bi bi-trash text-danger"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- TEACHINGS -->
            <div id="teachings" class="section d-none">
                <div class="d-flex justify-content-between mb-3">
                    <h3>Teachings</h3>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#teachingModal">
                        + Add Teaching
                    </button>
                </div>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Teaching Date</th>
                            <th>Published Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($teachings as $teaching)
                        <tr>
                            <td>
                                @if($teaching->image)
                                <img src="{{ asset('uploads/teachings/'.$teaching->image) }}" width="60" height="60" class="rounded">
                                @else
                                <i class="bi bi-file-earmark-text"></i>
                                @endif
                            </td>
                            <td>{{ $teaching->title }}</td>
                            <td>{{ $teaching->teaching_date }}</td>
                            <td>{{ $teaching->published_date }}</td>
                            <td>
                                <i class="bi bi-pencil text-warning me-2"></i>
                                <i class="bi bi-trash text-danger"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>


<!-- ADD ADMIN MODAL -->
<div class="modal fade" id="adminModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Add Admin</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="/admins" enctype="multipart/form-data">
                @csrf

                <input type="text" name="name" class="form-control mb-2" placeholder="Name">
                <input type="email" name="email" class="form-control mb-2" placeholder="Email">
                <input type="password" name="password" class="form-control mb-2" placeholder="Password">

                <input type="file" name="profile_image" class="form-control">

                <button class="btn btn-primary w-100 mt-3">Save</button>
            </form>

        </div>
    </div>
</div>

<!---- TEACHING MODAL ------>
<!-- Teaching Modal -->
<div class="modal fade" id="teachingModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content p-4">
      <div class="modal-header border-0">
        <h5 class="modal-title">Add Teaching</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="{{ route('teachings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">

          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Teaching</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
          </div>

          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
          </div>

          <div class="row">
            <div class="col mb-3">
              <label for="teaching_date" class="form-label">Teaching Date</label>
              <input type="date" name="teaching_date" class="form-control" required>
            </div>
            <div class="col mb-3">
              <label for="published_date" class="form-label">Published Date</label>
              <input type="date" name="published_date" class="form-control" required>
            </div>
          </div>

        </div>

        <div class="modal-footer border-0">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Teaching</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
    function showSection(sectionId) {
        document.querySelectorAll('.section').forEach(sec => {
            sec.classList.add('d-none');
        });

        document.getElementById(sectionId).classList.remove('d-none');
    }

</script>

@endsection
