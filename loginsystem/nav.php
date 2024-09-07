<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Navbar</title>
  <style>
    body {
  font-family: sans-serif;
  margin: 0;
  padding: 0;
}

nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem 2rem;
  background-color: #eee;
}

.logo {
  font-size: 1.5rem;
  font-weight: bold;
  color: #333;
}

.nav-links {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
}

.nav-links li {
  margin-right: 1rem;
}

.nav-links a {
  text-decoration: none;
  color: #333;
  padding: 0.5rem 1rem;
}

.nav-links a:hover {
  background-color: #ddd;
}

/* Responsive menu (hide on large screens) */
.menu-btn {
  display: none;
}

/* FontAwesome icon (replace with your preferred icon library) */
.fas.fa-bars {
  font-size: 1.5rem;
  color: #333;
}

/* Media Queries for responsive behavior */
@media screen and (max-width: 768px) {
  .nav-links {
    display: none;
  }
  .menu-btn {
    display: block;
  }
}

  </style>
</head>
<body>
  <nav>
    <a href="/loginsystem" class="logo">MY Log In System</a>
    <ul class="nav-links">
      <li><a href="welcome.php">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
    

    <button class="menu-btn">
      <button><a href="signup.php">Sign Up</a></button>
    </button>
  
    <button class="menu-btn">
      <button><a href="logout.php">Log out</a></button>
    </button>
    
</nav>

  <script>
    const menuBtn = document.querySelector('.menu-btn');
const navLinks = document.querySelector('.nav-links');

menuBtn.addEventListener('click', () => {
  navLinks.classList.toggle('active');
});

  </script>
</body>
</html>
