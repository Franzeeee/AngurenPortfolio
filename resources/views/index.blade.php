<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Personal portfolio Website</title>
  <!-- ....................Custom Css Link.................... -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <!-- ....................Start Nav Bar.................... -->
  <nav>
    @if (session()->has('success'))
      <div class="success" id="successMessage">
          <p>{{ session('success') }}</p>
      </div>
    @endif

    @if (session()->has('logout'))
      <div class="success" id="successMessage">
          <p>{{ session('logout') }}</p>
          <p id="close" title="close">+</p>
      </div>
    @endif

    <div class="container nav-container">
      <a href="" class="logo">Greg Anguren</a>
      <ul class="nav-links">
        <li><a href="#About">About</a></li>
        <li><a href="#Experiences">Skill</a></li>
        <li><a href="#Contact">Contact</a></li>        
        @auth
          <li><a href="{{ route('edit') }}">Edit</a></li>
          <li><a href="{{ route('logout') }}">Logout</a></li>
        @else
          <li><a href="{{ route('login') }}">Login</a></li>
        @endauth
      </ul>
    </div>
  </nav>
  <!-- ....................End Nav Bar.................... -->


  <!-- ....................Start Header Section.................... -->
  <header>
    <div class="container header-container">
      <div class="header-left">
        <img src="{{ $user->profile_image }}" alt="">
      </div>
      <div class="header-right">
        <p><b>Hello, I'm</b></p>
        <h1>{{ $user->profile_name }}</h1>
        <h2>{{ $user->career }}</h2>
        <div class="header-action-aria">
          <a href="" class="btn">Download CV</a>       
          <a href="#Contact" class="btn btn-dark">Contact info</a>              
        </div>
        <div class="header-social">
          <a href=""><img src="{{ asset('img/facebook.png') }}" class="icon1"></a>
          <a href=""><img src="{{ asset('img/linkedin.png') }}" class="icon1"></a>
          <a href=""><img src="{{ asset('img/github.png') }}" class="icon1"></a>
        </div>
      </div>
    </div>
  </header>
  <!-- ....................End Header Section.................... -->


  <!-- ....................Start About Section.................... -->
  <section id="About">
    <p class="heading-p">Get To Know More</p>
    <h1 class="heading">About Me</h1>
    <div class="container about-container">
      <div class="about-left">
        <img src="{{ $user->about_image }}" alt="">
      </div>
      <div class="about-right">
        <div class="basic-edu">
          <div class="edu-box">
            <img src="{{ asset('img/experience.png') }}" class="icon1">
            <h4>Best Skills</h4>
            <p>
              <br>
              {{ $user->best_skill }}           
            </p>
          </div>
          <div class="edu-box">
            <img src="{{ asset('img/education.png') }}" class="icon1">
            <h4>Education</h4>
            <p>
              <br>
              {{ $user->education }}              
            </p>
          </div>
        </div>
        <p>
          Hi there, I'm Greg Anguren, a 21-year-old IT enthusiast currently pursuing a degree in Information Technology at Leyte Normal University. 
          My fascination with technology goes beyond the classroom, as I am consistently engaged in exploring the latest advancements in web development. 
          As a student, I am driven by a passion for problem-solving and enjoy the logical challenges that coding presents. 
          Looking forward, I aspire to carve a niche in the web development domain. Outside of the coding realm, I find relaxation in building and customizing computers, a hobby that seamlessly blends my technical skills with a touch of creativity. 
          I also revel in the camaraderie of online gaming, where strategic thinking and teamwork come together in a virtual environment. 
          A voracious reader of tech blogs and a regular attendee at IT meetups, I thrive on staying connected with the latest industry trends. 
          While I embrace the fast-paced nature of the tech world, my pet peeve lies in unreliable Wi-Fi connections, an inconvenience that disrupts my seamless digital exploration. 
          Balancing the intricacies of IT studies with my passion for innovation, I'm on a quest to not only excel academically but also make a meaningful impact in the realm of technology.  
        </p>
      </div>
    </div>
  </section> 
  <!-- ....................End About Section.................... -->


  <!-- ....................Start Experience Section.................... -->
  <section id="Experiences">
    <a href="#Experiences" class="arrow"><img src="{{ asset('img/arrow.png') }}" class="icon1"></a>
    <p class="heading-p">Explore My</p>
    <h1 class="heading">Skill</h1>
    <div class="container experience-container">
      <div class="experience-box">
        <h2>Frontend Development</h2>
        <div class="experience">

          @foreach ($frontend as $front_end)
            <div class="ex-div">
              <img src="{{ asset('img/checkmark.png') }}" class="icon1">
              <div>
                <h4>{{ $front_end->skill }}</h4>
                <p>{{ $front_end->level }}</p>
              </div>
            </div>
          @endforeach

        </div>
      </div>
      <div class="experience-box">
        <h2>Backend Development</h2>
        <div class="experience">

          @foreach ($backend as $back_end)
          <div class="ex-div">
            <img src="{{ asset('img/checkmark.png') }}" class="icon1">
            <div>
              <h4>{{ $back_end->skill }}</h4>
              <p>{{ $back_end->level }}</p>
            </div>
          </div>
        @endforeach

        </div>
      </div>
    </div>
  </section>
  <!-- ....................End Experience Section.................... -->


  <!-- ....................Start Contact Section.................... -->
  <section id="Contact">
    <a href="#Contact" class="arrow"><img src="{{ asset('img/arrow.png') }}" class="icon1"></a>
    <p class="heading-p">Get in Touch</p>
    <h1 class="heading">Contact Me</h1>
    <div class="contact-container container">
      <div class="email">
        <img src="{{ asset('img/email.png') }}" class="icon1">
        <a href=""><h5>Example@gmail.com</h5></a>
      </div>
      <div class="linkedin">
        <img src="{{ asset('img/linkedin.png') }}" class="icon1">
        <a href=""><h5>Linkedin</h5></a>
      </div>
    </div>
  </section>
  <!-- ....................End Contact Section.................... -->


  <!-- ....................Start Footer Section.................... -->
  <footer>
    <ul class="nav-links">
      <li><a href="#About">About</a></li>
      <li><a href="#Experiences">Experiences</a></li>
      <li><a href="#Projects">Projects</a></li>
      <li><a href="#Contact">Contact</a></li>
      @auth
      <li><a href="{{ route('edit') }}">Edit</a></li>
      <li><a href="{{ route('logout') }}">Logout</a></li>
    @else
      <li><a href="{{ route('login') }}">Login</a></li>
    @endauth
    </ul>
    <p>&copy; Copyright Greg Anguren || All Rights Reserved.</p>
  </footer>
  <!-- ....................End Footer Section.................... -->

<script src="{{ asset('js/index.js') }}"></script>
</body>
</html>
