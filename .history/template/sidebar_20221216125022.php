<div class="sidebar">
  <ul class="nav-list">
  <li>
      <a id="btn" class="bg-slate-100 hover:bg-slate-200">
        <i class="uil uil-bars"></i>
        <span class="links_name">Menu</span>
      </a>
        <span class="tooltip">Menu</span>
    </li>
    <li>
      <a class="bg-slate-100 hover:bg-slate-200" href="index.php" id="active">
        <i class='bx bx-home-smile'></i>
        <span class="links_name">Home </span>
      </a>
        <span class="tooltip">Home</span>
    </li>
    <li>
      <a class="bg-slate-100 hover:bg-slate-200" href="dashboard.php">
        <i class='bx bx-pie-chart-alt-2' ></i>
        <span class="links_name">Dashboard</span>
      </a>
      <span class="tooltip">Dashboard</span>
    </li>
    <li>
      <a class="bg-slate-100 hover:bg-slate-200" href="user_report.php">
      <i class='bx bx-network-chart'></i>
        <span class="links_name">Your Report</span>
      </a>
      <span class="tooltip">Your Report</span>
    </li>
    <li>
      <a class="bg-slate-100 hover:bg-slate-200" href="shop.php">
      <i class='uil uil-shopping-bag'></i>
        <span class="links_name">Shop</span>
      </a>
      <span class="tooltip">Shop</span>
    </li>
  <li>
  <li>
      <a class="bg-slate-100 hover:bg-slate-200" href="teacher_auth.php">
      <i class="uil uil-comment-lock"></i>
        <span class="links_name">Authentifications</span>
      </a>
      <span class="tooltip">Authentifications</span>
    </li>
  <li>
      <a class="bg-slate-100 hover:bg-slate-200" href="profile.php?profile_username=<?php echo $userLoggedIn;?>">
        <i class='bx bx-user' ></i>
        <span class="links_name">Profile</span>
      </a>
      <span class="tooltip">Profile</span>
    </li>
    <li>
      <a class="bg-slate-100 hover:bg-slate-200" href="../settings/user_settings.php">
        <i class='bx bx-cog' ></i>
        <span class="links_name">Settings</span>
      </a>
      <span class="tooltip">Settings</span>
    </li>
  </ul>
  </div>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
  });
  </script>

  
