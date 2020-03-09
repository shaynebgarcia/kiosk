<nav class="navbar header-navbar pcoded-header" header-theme="theme1">
	<div class="navbar-wrapper">
		<div class="navbar-logo" logo-theme="theme6">
			@if($pageSlug == 'kiosk')
				<a href="{{ route('kiosk.index') }}">
					<span style="font-size: x-large;letter-spacing: 5px;">KIOSK</span>
				</a>
			@else
				<a href="{{ route('dashboard') }}">
					<span style="font-size: x-large;letter-spacing: 2px;">COMPANY</span>
				</a>
			@endif
			<a class="mobile-menu" id="mobile-collapse" href="#!">
				<i class="feather icon-menu icon-toggle-right"></i>
			</a>
			<a class="mobile-options waves-effect waves-light">
				<i class="feather icon-more-horizontal"></i>
			</a>
		</div>
	<div class="navbar-container container-fluid">
		<ul class="nav-left">
			<!-- <li class="co-text" style="padding-left: 2rem;">
				{{ config('custom.company.name') }}
			</li> -->
			<li>
				<a href="#!" onclick="toggleFullScreen();">
					<i class="full-screen feather icon-maximize"></i>
				</a>
			</li>
		</ul>
		<ul class="nav-right">
			@if($pageSlug == 'kiosk')
				<li class="header-notification">
					<a href="#" id="btn-show-product-list">
						<i class="feather icon-monitor"></i>
					</a>
				</li>
				<li class="header-notification">
					<a href="#" id="btn-show-listing">
						<i class="feather icon-list"></i>
					</a>
				</li>
			@else
				<li class="header-notification">
					<div class="dropdown-primary dropdown">
						<div class="dropdown-toggle" data-toggle="dropdown">
							<i class="feather icon-bell"></i>
							<span class="badge bg-c-red">5</span>
						</div>
						<ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
							<li>
								<h6>Notifications</h6>
								<label class="label label-danger">New</label>
							</li>
							<li>
								<div class="media">
									<img class="img-radius" src="{{ asset('admindek/files/assets/images/avatar-4.jpg') }}" alt="Generic placeholder image">
									<div class="media-body">
										<h5 class="notification-user">John Doe</h5>
										<p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
										<span class="notification-time">30 minutes ago</span>
									</div>
								</div>
							</li>
							<li>
								<div class="media">
									<img class="img-radius" src="{{ asset('admindek/files/assets/images/avatar-3.jpg') }}" alt="Generic placeholder image">
									<div class="media-body">
										<h5 class="notification-user">Joseph William</h5>
										<p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
										<span class="notification-time">30 minutes ago</span>
									</div>
								</div>
							</li>
							<li>
								<div class="media">
									<img class="img-radius" src="{{ asset('admindek/files/assets/images/avatar-4.jpg') }}" alt="Generic placeholder image">
									<div class="media-body">
										<h5 class="notification-user">Sara Soudein</h5>
										<p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
										<span class="notification-time">30 minutes ago</span>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</li>
			@endif
			<li class="user-profile header-notification">
				<div class="dropdown-primary dropdown">
					<div class="dropdown-toggle" data-toggle="dropdown">
						<img src="https://api.adorable.io/avatars/285/<?php echo rand(5, 15); ?>@adorable.png" class="img-radius" alt="User-Profile-Image">
						<span>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
						<i class="feather icon-chevron-down"></i>
					</div>
					<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
						<li>
							
							@if($pageSlug == 'kiosk')
								<h5>{{ $kiosk->branch }} - {{ $kiosk->kiosk_no }}</h5>
								<small>{{ Auth::user()->user_no }}</small>
							@endif
						</li>
						@if($pageSlug == 'kiosk')
							@can('Access Dashboard')
							<li>
								<a href="{{ route('dashboard') }}">
								<i class="feather icon-external-link"></i> Dashboard
								</a>
							</li>
							@endcan
						@else
							<li>
								<a href="{{ route('kiosk.index') }}">
								<i class="feather icon-external-link"></i> Kiosk POS
								</a>
							</li>
						@endif
						<li>
							<a href="#!">
							<i class="feather icon-settings"></i> Settings
							</a>
						</li>
						<li>
							<a href="auth-lock-screen.html">
							<i class="feather icon-lock"></i> Lock Screen
							</a>
						</li>
						<li>
							<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
								<i class="feather icon-log-out"></i> Logout
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
						</li>
					</ul>
				</div>
			</li>
		</ul>
	</div>
	</div>
</nav>