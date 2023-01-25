   <div class="d-flex flex-column d-none d-sm-flex  p-3 text-white bg-black " style="width: 280px; height:100vh;">
       <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">

           <span class="fs-4"><?= $_SESSION['username']; ?></span>
       </a>
       <hr>
       <ul class="nav nav-pills flex-column mb-auto">
           <li class="nav-item">
               <button class="btn btn-outline-primary">
                   <a href="<?= BASE_URL;  ?>" class="nav-link text-white">
                       Dashboard
                   </a>
               </button>

           </li>
           <li class="nav-item my-2">
               <button class="btn btn-outline-primary">
                   <a href="<?= BASE_URL;  ?>add" class="nav-link text-white">
                       add article
                   </a>
               </button>

           </li>


       </ul>
       <hr>
       <div class="dropdown">
           <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
               <strong>option</strong>
           </a>
           <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
               <li><a class="dropdown-item" href="#">Profile</a></li>
               <li>
                   <hr class="dropdown-divider">
               </li>
               <li><a class="dropdown-item" href="<?= BASE_URL;  ?>logout">Sign out</a></li>
           </ul>
       </div>
   </div>