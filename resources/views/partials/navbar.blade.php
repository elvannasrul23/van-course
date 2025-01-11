<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/') }}">Van Course</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('students.index') }}"><i class="fa fa-user"></i> Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('courses.index') }}"><i class="fa fa-book"></i> Kursus</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('instructors.index') }}"><i class="fa fa-chalkboard-teacher"></i> Instruktur</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('enrollments.index') }}"><i class="fa fa-clipboard-list"></i> Pendaftaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('assignments.index') }}"><i class="fa fa-tasks"></i> Tugas</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
