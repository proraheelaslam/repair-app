
<div id="kt_header" class="header flex-column header-fixed">
						@php
						$uzr = Auth::user()->name;

						 $name = trim($uzr);
						 $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
						 $first_name = trim( preg_replace('#'.preg_quote($last_name,'#').'#', '', $name ) );

						@endphp
						<!--begin::Top-->
						<div class="header-top">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Left-->
								<div class="d-none d-lg-flex align-items-center mr-3">
									<!--begin::Logo-->
									<a href="{{ url('admin/home ') }}" class="mr-20">
										<img  alt="Logo" src="{{asset('https://preview.keenthemes.com/metronic/theme/html/demo2/dist/assets/media/logos/logo-letter-1.png')}}" class="max-h-70px" />
									</a>
									<!--end::Logo-->
									<!--begin::Tab Navs(for desktop mode)-->
									<ul class="header-tabs nav align-self-end font-size-lg" role="tablist">
										<!--begin::Item-->


										<li class="nav-item">
                                                <a href="#" class="nav-link py-4 px-6 hdr_tab {{((request()->is('admin/customers*')) || (request()->is('admin/home')) || (request()->is('admin/categories*')) ) ? 'active': ''}}"



                                                   data-toggle="tab" data-target="#kt_header_tab_1" role="tab">Home</a>
										</li>


										<!--end::Item-->

										<!--begin::Item-->
										<li class="nav-item mr-3">
											<a href="#" class="nav-link py-4 px-6 hdr_tab {{((request()->is('admin/jobs*')) || (request()->is('admin/items*')) ) ? 'active': ''}}"

                                               data-toggle="tab" data-target="#kt_header_tab_2" role="tab">Manage Jobs</a>
										</li>
										<!--end::Item-->

									</ul>
									<!--begin::Tab Navs-->
								</div>
								<!--end::Left-->
								<!--begin::Topbar-->
								<div class="topbar bg-primary">






									<!--begin::User-->
									<div class="topbar-item">
										<div class="btn btn-icon btn-hover-transparent-white w-sm-auto d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
											<div class="d-flex flex-column text-right pr-sm-3">
												<span class="text-white opacity-50 font-weight-bold font-size-sm d-none d-sm-inline">{{{ @Auth::guard('admin')->user()->name}}}</span>
											</div>
											<span class="symbol symbol-35">
												<!-- @php
												$uzr = @Auth::guard('admin')->user()->name;

												$name = trim($uzr);
												$last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);

												@endphp -->
												<span class="symbol-label font-size-h5 font-weight-bold text-white bg-white-o-30">{{$firstStringCharacter = substr($first_name, 0, 1)}}</span>
											</span>
										</div>
									</div>
									<!--end::User-->
								</div>
								<!--end::Topbar-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Top-->
						<!--begin::Bottom-->
						<div class="header-bottom">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Header Menu Wrapper-->
								<div class="header-navs header-navs-left" id="kt_header_navs">
									<!--begin::Tab Navs(for tablet and mobile modes)-->
									<ul class="header-tabs p-5 p-lg-0 d-flex d-lg-none nav nav-bold nav-tabs" role="tablist">
										<!--begin::Item-->
										<li class="nav-item mr-2">
											<a href="#" class="nav-link btn btn-clean active" data-toggle="tab" data-target="#kt_header_tab_1" role="tab">Home</a>
										</li>
										<!--end::Item-->
										<!--begin::Item-->
										<li class="nav-item mr-2">
											<a href="#" class="nav-link btn btn-clean" data-toggle="tab" data-target="#kt_header_tab_2" role="tab">Reports</a>
										</li>

										<!--end::Item-->
										<!--begin::Item-->
										<li class="nav-item mr-2">
											<a href="#" class="nav-link btn btn-clean" data-toggle="tab" data-target="#kt_header_tab_2" role="tab">Manage Jobs</a>
										</li>
										<!--end::Item-->

									</ul>
									<!--begin::Tab Navs-->
									<!--begin::Tab Content-->
									<div class="tab-content">
										<!--begin::Tab Pane-->
										<div class="tab-pane py-5 p-lg-0 show {{((request()->is('admin/customers*')) || (request()->is('admin/home')) || (request()->is('admin/categories*')) ) ? 'active': ''}}" id="kt_header_tab_1">
											<!--begin::Menu-->
											<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
												<!--begin::Nav-->
												<ul class="menu-nav">
													<li class="menu-item {{ (request()->is('admin/home')) ? 'menu-item-active' : '' }} " aria-haspopup="true">
														<a href="{{ url('admin/home ') }}" class="menu-link">
															<span class="menu-text">Dashboard</span>
														</a>
													</li>

													<li class="menu-item {{ (request()->is('admin/customers*')) ? 'menu-item-active' : '' }}">
														<a href="{{ url('admin/customers ') }}" class="menu-link">
															<span class="menu-text">Manage Customers</span>
														</a>
													</li>

                                                    <li class="menu-item {{ (request()->is('admin/categories*')) ? 'menu-item-active' : '' }}">
                                                        <a href="{{ url('admin/categories ') }}" class="menu-link">
                                                            <span class="menu-text">Manage Categories</span>
                                                        </a>
                                                    </li>

                                                    <li class="menu-item " style="display: none">
														<a href="{{ url('admin/settings ') }}" class="menu-link">
															<span class="menu-text">Settings</span>
														</a>
													</li>

												</ul>
												<!--end::Nav-->
											</div>
											<!--end::Menu-->
										</div>
										<!--begin::Tab Pane-->

                                        <!--begin::Tab Pane-->
                                        <div class="tab-pane py-5 p-lg-0 show {{((request()->is('admin/jobs*')) || (request()->is('admin/job*')) || (request()->is('admin/items*')) ) ? 'active': ''}}" id="kt_header_tab_2">
                                            <!--begin::Menu-->
                                            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                                                <!--begin::Nav-->
                                                <ul class="menu-nav">
                                                    <li class="menu-item hd_manage_jobs {{ (request()->is('admin/jobs*')) || (request()->is('admin/job*')) ? 'menu-item-active' : '' }} ">
                                                        <a href="{{ url('admin/jobs ') }}" class="menu-link">
                                                            <span class="menu-text">Manage Jobs</span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-item hd_manage_jobs {{ (request()->is('admin/items*')) ? 'menu-item-active' : '' }}">
                                                        <a href="{{ url('admin/items ') }}" class="menu-link">
                                                            <span class="menu-text">Manage Items</span>
                                                        </a>
                                                    </li>


                                                </ul>
                                                <!--end::Nav-->
                                            </div>
                                            <!--end::Menu-->
                                        </div>
                                        <!--begin::Tab Pane-->

									</div>
									<!--end::Tab Content-->
								</div>
								<!--end::Header Menu Wrapper-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Bottom-->
					</div>
<script>
    $("body").on('click','.hdr_tab', function (){


        let tabId = $(this).attr('data-target');

        let current_url = $(tabId).find('li:first a').attr('href');
        window.location.href = current_url;
        console.log(current_url);
    });
    $(document).ready(function (){
        console.log('.', $(".hd_manage_jobs.menu-item-active"));
        if($(".hd_manage_jobs.menu-item-active").length > 0){
            //$(".header-tabs").find('.hdr_tab_2').click();
        }



    });
</script>
