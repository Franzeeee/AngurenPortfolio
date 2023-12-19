<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>
<body>
    <nav>
        <div class="back" onclick="window.location.href='{{ route('home') }}'">
            <img src="{{ asset('img/arrow.png') }}" alt="">
            <p>Back</p>
        </div>
        @if (session('success'))
        <div class="success">
            <p>{{ session('success') }}</p>
        </div>
        @endif
    </nav>
    <div class="container">

        <!-- ....................Start Header Section.................... -->
        <section>
            <form action="{{ route('update.header') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <legend>Header</legend>
                <figure>
                    <img src="{{ $user->profile_image }}" id="previewProfileImage">
                </figure>
                <div class="form-group">
                    <label for="profile_image">Update Profile Picture</label>
                    <input type="file" name="profile_image" id="profileInput">
                </div>
                <div class="form-group">
                    <label for="profile_name">Update Profile Name</label>
                    <input type="text" name="profile_name" value="{{ $user->profile_name }}" autocomplete="off" required>
                </div>
               <div class="form-group">
                    <label for="career">Update Career</label>
                    <input type="text" name="career" value="{{ $user->career }}" autocomplete="off" required>
                </div>
                <button type="submit">Update</button>
            </form>
        </section>
        <!-- ....................End Header Section.................... -->

        <!-- ....................Start About Section.................... -->
        <section>
            <form action="{{ route('update.about') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <legend>About</legend>
                <figure>
                    <img src="{{ $user->about_image }}" id="previewAboutImage">
                </figure>
                <div class="form-group">
                    <label for="about_image">Update About Picture</label>
                    <input type="file" name="about_image" id="aboutInput">
                </div>
                <div class="form-group">
                    <label for="best_skill">Update Best Skills</label>
                    <input type="text" name="best_skill" value="{{ $user->best_skill }}" autocomplete="off" required>
                </div>
               <div class="form-group">
                    <label for="education">Update Education</label>
                    <input type="text" name="education" value="{{ $user->education }}">
                </div>
                <div class="form-group">
                    <label for="about">Update About Yourself</label>
                   <textarea name="about" id="" cols="30" rows="10">{{ $user->about }}</textarea>
                </div>
                <button type="submit">Update</button>
            </form>
        </section>
        <!-- ....................End About Section.................... -->
        <section>
            <form action="{{ route('add.skill') }}" method="POST">
                @csrf
                <legend>Skill</legend>
               <div class="form-group">
                <h4>Add Skill</h4>
                    <label for="skill">Skill Name</label>
                    <input type="text" name="skill" placeholder="Skill Name" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="type">Skill Type</label>
                    <select name="type" id="skillType">
                        <option value="Frontend">Frontend</option>
                        <option value="Backend">Backend</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="level">Skill Type</label>
                    <select name="level" id="level">
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Expert">Expert</option>
                    </select>
                </div>
                <button type="submit">Add</button>
            </form>

            <h5>Frontend Skill</h5>
            <div class="frontend">
                @foreach ($frontend as $front_end)
                    <div class="skill">
                        <p>{{ $front_end->skill }}</p>
                        <p class="delete" title="Delete" onclick="window.location.href='{{ route('delete.skill', ['id' => $front_end->id]) }}'">+</p>
                    </div>
                @endforeach
            </div>

            <h5>Backend Skill</h5>
            <div class="backend">
                @foreach ($backend as $back_end)
                    <div class="skill">
                        <p>{{ $back_end->skill }}</p>
                        <p class="delete" title="Delete" onclick="window.location.href='{{ route('delete.skill', ['id' => $back_end->id]) }}'">+</p>
                    </div>
                @endforeach
            </div>

        </section>
    </div>

<script src="{{ asset('js/edit.js') }}"></script>
</body>
</html>