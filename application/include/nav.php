<div class="main">
    <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle js-sidebar-toggle">
            <i class="hamburger align-self-center"></i>
        </a>

        <form class="d-none d-sm-inline-block">
            <div class="input-group input-group-navbar">
                <input type="text" class="form-control" placeholder="Search…" aria-label="Search">
                <button class="btn" type="button">
                    <i class="align-middle" data-feather="search"></i>
                </button>
            </div>
        </form>

        <!-- <ul class="navbar-nav d-none d-lg-flex">
            <li class="nav-item px-2 dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="megaDropdown" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Mega Menu
                </a>
                <div class="dropdown-menu dropdown-menu-start dropdown-mega" aria-labelledby="megaDropdown">
                    <div class="d-md-flex align-items-start justify-content-start">
                        <div class="dropdown-mega-list">
                            <div class="dropdown-header">UI Elements</div>
                            <a class="dropdown-item" href="#">Alerts</a>
                            <a class="dropdown-item" href="#">Buttons</a>
                            <a class="dropdown-item" href="#">Cards</a>
                            <a class="dropdown-item" href="#">Carousel</a>
                            <a class="dropdown-item" href="#">General</a>
                            <a class="dropdown-item" href="#">Grid</a>
                            <a class="dropdown-item" href="#">Modals</a>
                            <a class="dropdown-item" href="#">Tabs</a>
                            <a class="dropdown-item" href="#">Typography</a>
                        </div>
                        <div class="dropdown-mega-list">
                            <div class="dropdown-header">Forms</div>
                            <a class="dropdown-item" href="#">Layouts</a>
                            <a class="dropdown-item" href="#">Basic Inputs</a>
                            <a class="dropdown-item" href="#">Input Groups</a>
                            <a class="dropdown-item" href="#">Advanced Inputs</a>
                            <a class="dropdown-item" href="#">Editors</a>
                            <a class="dropdown-item" href="#">Validation</a>
                            <a class="dropdown-item" href="#">Wizard</a>
                        </div>
                        <div class="dropdown-mega-list">
                            <div class="dropdown-header">Tables</div>
                            <a class="dropdown-item" href="#">Basic Tables</a>
                            <a class="dropdown-item" href="#">Responsive Table</a>
                            <a class="dropdown-item" href="#">Table with Buttons</a>
                            <a class="dropdown-item" href="#">Column Search</a>
                            <a class="dropdown-item" href="#">Muulti Selection</a>
                            <a class="dropdown-item" href="#">Ajax Sourced Data</a>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="resourcesDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Resources
                </a>
                <div class="dropdown-menu" aria-labelledby="resourcesDropdown">
                    <a class="dropdown-item" href="https://adminkit.io/" target="_blank"><i class="align-middle me-1"
                            data-feather="home"></i>
                        Homepage</a>
                    <a class="dropdown-item" href="https://adminkit.io/docs/" target="_blank"><i
                            class="align-middle me-1" data-feather="book-open"></i>
                        Documentation</a>
                    <a class="dropdown-item" href="https://adminkit.io/docs/getting-started/changelog/"
                        target="_blank"><i class="align-middle me-1" data-feather="edit"></i> Changelog</a>
                </div>
            </li>
        </ul> -->

        <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
                <li class="nav-item dropdown">
                    <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                        <div class="position-relative">
                            <i class="align-middle" data-feather="bell"></i>
                            <span class="indicator track"></span>
                        </div>
                    </a>
                    
                </li>
                
                <!-- <li class="nav-item dropdown">
                    <a class="nav-flag dropdown-toggle" href="#" id="languageDropdown" data-bs-toggle="dropdown">
                        <img src="../../img/flags/us.png" alt="English" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                        <a class="dropdown-item" href="#">
                            <img src="../../img/flags/us.png" alt="English" width="20" class="align-middle me-1" />
                            <span class="align-middle">English</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <img src="../../img/flags/es.png" alt="Spanish" width="20" class="align-middle me-1" />
                            <span class="align-middle">Spanish</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <img src="../../img/flags/ru.png" alt="Russian" width="20" class="align-middle me-1" />
                            <span class="align-middle">Russian</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <img src="../../img/flags/de.png" alt="German" width="20" class="align-middle me-1" />
                            <span class="align-middle">German</span>
                        </a>
                    </div>
                </li> -->
                <li class="nav-item">
                    <a class="nav-icon js-fullscreen d-none d-lg-block" href="#">
                        <div class="position-relative">
                            <i class="align-middle" data-feather="maximize"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-icon pe-md-0 dropdown-toggle   profile" href="#" data-bs-toggle="dropdown">
                        <!-- <img src="../../img/avatars/avatar.jpg" class="avatar img-fluid rounded" alt="Charles Hall" /> -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class='dropdown-item' href='pages-profile.html'><i class="align-middle me-1"
                                data-feather="user"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i>
                            Analytics</a>
                        <div class="dropdown-divider"></div>
                        <a class='dropdown-item' href='pages-settings.html'><i class="align-middle me-1"
                                data-feather="settings"></i> Settings &
                            Privacy</a>
                        <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i>
                            Help Center</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Log out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <script src='../../js/jquery-3.3.1.min.js'></script>

<script>
	$(document).ready(function(){

       
            const countRowNumbers = (tableName, label) => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../api/admin.php",
                data: {
                    action: "count",
                    table: tableName,
                },
                success: (res) => {
                    console.log(res)
                    label.html(res.rowNumber);
                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }
        countRowNumbers("level", $(".track"))
  
		showData();
function showData() {
    var storedName = localStorage.getItem('username'); // Retrieve the username from localStorage
    var imagePath = localStorage.getItem('image'); // Get the image path from localStorage
    var imgSrc = (imagePath && imagePath !== 'no') ? '../uploads/' + imagePath : '../../img/avatars/avatar.jpg';
    $('.profile').html(`<img src='${imgSrc}' class='avatar img-fluid rounded me-1' alt='${storedName || 'Charles Hall'}'/>`);
	// $('.username').text(storedName);
}

		
	})
	  
</script>