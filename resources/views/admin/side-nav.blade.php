<div class="aside-menu flex-column-fluid">
						<!--begin::Aside Menu-->
						<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
							<!--begin::Menu-->
							<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
								<div class="menu-item">
									<div class="menu-content pb-2">
										<span class="menu-section text-muted text-uppercase fs-8 ls-1">{{__('admin.AdminTools')}}</span>
									</div>
								</div>

                                @can('view site settings')
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{isset($website_settings) || isset($website_seo)? 'show hover' : ''}}">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
										<i class="bi bi-wrench-adjustable"></i>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">{{__('admin.Settings')}}</span>
										<span class="menu-arrow"></span>
									</span>
									<div class="menu-sub menu-sub-accordion menu-active-bg {{isset($website_settings) ? 'show' : ''}}">
										<div class="menu-item">
											<a class="menu-link {{isset($website_settings) ? 'active' : ''}}" href="{{route('admin.settings.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{__('admin.WebsiteConfigrations')}}</span>
											</a>
										</div>
									</div>
                                    <div class="menu-sub menu-sub-accordion menu-active-bg {{isset($website_seo) ? 'show' : ''}}">
										<div class="menu-item">
											<a class="menu-link {{isset($website_seo) ? 'active' : ''}}" href="{{route('admin.seo.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{__('admin.SeoConfigrations')}}</span>
											</a>
										</div>
									</div>
								</div>
                                @endcan
                                @can('view roles')
                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{isset($index_roles) ? 'show hover' : ''}}">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
									    <i class="bi bi-shield-lock"></i>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">{{__('admin.Roles')}}</span>
										<span class="menu-arrow"></span>
									</span>
									<div class="menu-sub menu-sub-accordion menu-active-bg {{isset($index_roles) ? 'show' : ''}}">
										<div class="menu-item">
											<a class="menu-link {{isset($index_roles) ? 'active' : ''}}" href="{{route('admin.roles.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{__('admin.RolesList')}}</span>
											</a>
										</div>
									</div>
								</div>
                                @endcan

                                @can('view testimonials')
										<div class="menu-item">
											<a class="menu-link {{isset($index_testimonials) ? 'active' : ''}}" href="{{route('admin.testimonials.index')}}">
                                                <span class="menu-icon">
                                                    <i class="bi bi-chat-left-quote-fill"></i>
                                                </span>
												<span class="menu-title">{{__('admin.Testimonials')}}</span>
											</a>
										</div>
                                @endcan

								<div class="menu-item">
									<div class="menu-content">
										<div class="separator mx-1 my-4"></div>
									</div>
								</div>

							</div>
							<!--end::Menu-->
						</div>
						<!--end::Aside Menu-->
					</div>
