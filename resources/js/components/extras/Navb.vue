<template>
  <div>
    <div>
					<div class="min-h-screen bg-gray-100">
						<nav class="bg-white shadow-sm" >
							<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
								<div class="flex justify-between h-16 relative">
									<div class="flex">
										<div class="flex-shrink-0 flex items-center">
											<a href="/"><img class="block lg:hidden h-12 w-auto" src="https://careclick.healthcare/wp-content/uploads/2019/12/cropped-CareClick-official-new-logo.png" alt="CareClick logo" /></a>
											<a href="/"><img class="hidden lg:block h-12 w-auto" src="https://careclick.healthcare/wp-content/uploads/2019/12/cropped-CareClick-official-new-logo.png" alt="CareClick logo" /></a>
										</div>
										<div class="hidden sm:ml-20 sm:flex items-center">
											<div class="ml-10 flex items-baseline hidden lg:block">
												<a href="/" :class="active == '/' ? 'active' : ''" class="px-3 py-2 rounded-md text-sm font-medium focus:outline-none focus:text-white focus:bg-indigo-200">Dashboard</a>
												<a href="/appointments" :class="active == 'appointments' ? 'active' : ''" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white hover:bg-indigo-500 focus:outline-none focus:text-indigo-700 focus:bg-indigo-200">Appointments</a>
												<a href="/schedules" :class="active == 'schedules' ? 'active' : ''" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white hover:bg-indigo-500 focus:outline-none focus:text-indigo-700 focus:bg-indigo-200">Schedules</a>
												<a href="/doctors" :class="active == 'doctors' ? 'active' : ''" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white hover:bg-indigo-500 focus:outline-none focus:text-indigo-700 focus:bg-indigo-200">Doctors</a>
												<a href="/patients" :class="active == 'patients' ? 'active' : ''" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white hover:bg-indigo-500 focus:outline-none focus:text-indigo-700 focus:bg-indigo-200">Patients</a>
												<a href="/reports" :class="active == 'reports' ? 'active' : ''" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-white hover:bg-indigo-500 focus:outline-none focus:text-indigo-700 focus:bg-indigo-200">Reports</a>
											</div>
										</div>
									</div>
									<div class="flex-1 flex items-center justify-center px-2 lg:ml-6 lg:justify-end">
										<div class="max-w-lg w-full lg:max-w-xs hidden xl:block">
											<label for="search" class="sr-only">Search</label>
											<div class="relative">
												<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
													<svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
														<path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
													</svg>
												</div>
												<input id="search" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out" placeholder="Search" type="search" />
											</div>
										</div>
									</div>
									<div class="hidden sm:ml-6 sm:flex sm:items-center">
										<a href="/search"><button class="p-1 mr-4 border-2 border-transparent text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:text-gray-500 bg-gray-100 transition duration-150 ease-in-out" aria-label="Notifications">
											<svg class="h-6 w-6" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</button></a>
										<a href="/message">
											<button class="inline-block relative p-1 mr-4 border-2 border-transparent text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:text-gray-500 bg-gray-100 transition duration-150 ease-in-out" aria-label="Notifications">
												<svg class="h-6 w-6" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M3 8L10.8906 13.2604C11.5624 13.7083 12.4376 13.7083 13.1094 13.2604L21 8M5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
												<span class="absolute top-0 right-0 block h-2 w-2 rounded-full text-white shadow-solid bg-red-400"></span>
											</button>
										</a>
										<div v-on-clickaway="hideNoty">	
											<div @click="noty = !noty">
												<button class="inline-block relative p-1 border-2 border-transparent text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:text-gray-500 bg-gray-100 transition duration-150 ease-in-out" aria-label="Notifications">
													<span class="">
														<svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
															<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
														</svg>
													</span>
													<span class="absolute top-0 right-0 block h-2 w-2 rounded-full text-white shadow-solid bg-red-400"></span>
												</button>
											</div>
										</div>		
										<div class="ml-3 relative" v-on-clickaway="away">
											<div @click="show = !show">
												<button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out" id="user-menu" aria-label="User menu" aria-haspopup="true" x-bind:aria-expanded="open">
													<span class="inline-block relative">
														<img class="h-8 w-8 rounded-full" v-if="user.picture" :src="`../images/${user.picture}`" alt="" /> 
														<icon name="user" v-else class="h-8 w-8 shadow-lg rounded-full overflow-hidden bg-gray-100 mx-auto"/>
														<span class="absolute top-0 right-0 block h-2 w-2 rounded-full text-white shadow-solid bg-green-400"></span>
													</span>
												</button>
											</div>
											<transition name="slide-fade">
                        <div v-if="show" class="z-50 origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                          <div class="py-1 rounded-md bg-white shadow-xs">
                            <a href="/profile" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Your Profile</a>
                            <a href="/settings" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Settings</a>
                            <a @click="apiLogout" class="cursor-pointer block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Sign out</a>
                          </div>
                        </div>
											</transition>  
										</div>
									</div>
									<div class="-mr-2 flex items-center lg:hidden"  @click="togglenav = !togglenav">
										<button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 ml-4 bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
											<svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
												<path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
												<path class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
											</svg>
										</button>
									</div>
									<transition name="slide-fade">
											<div class="absolute max-w-sm mt-14 right-0 text-sm rounded mr-14 border border-gray-100" v-if="noty">
												<div class="bg-white shadow-xl">
													<div class="flex items-center px-3 py-2 border-b border-gray-200 hover:bg-gray-200 cursor-pointer">
														<img src="http://localhost:8000/images/15875123584a596f3764d041ea6aa83f4cdd1dbf01.png" class="w-8 rounded-full" alt="">
														<div class="ml-3">
															<p class="text-gray-600">Alex commented on timeline Share</p>
															<p class="text-xs text-gray-400">10 min ago</p>
														</div>	
													</div>	
												</div>
												<div class="bg-white shadow-lg ">
													<div class="flex items-center px-3 py-2 border-b border-gray-200 hover:bg-gray-200 cursor-pointer">
														<img src="http://localhost:8000/images/15875123584a596f3764d041ea6aa83f4cdd1dbf01.png" class="w-8 rounded-full" alt="">
														<div class="ml-3">
															<p class="text-gray-600">Alex commented on timeline Share</p>
															<p class="text-xs text-gray-400">10 min ago</p>
														</div>	
													</div>	
												</div>
												<div class="bg-white shadow-lg ">
													<div class="flex items-center px-3 py-2 border-b border-gray-200 hover:bg-gray-200 cursor-pointer">
														<img src="http://localhost:8000/images/15875123584a596f3764d041ea6aa83f4cdd1dbf01.png" class="w-8 rounded-full" alt="">
														<div class="ml-3">
															<p class="text-gray-600">Alex commented on timeline Share</p>
															<p class="text-xs text-gray-400">10 min ago</p>
														</div>	
													</div>	
												</div>
											</div>
									</transition>	
								</div>
							</div>
							<div class="lg:hidden" :class="togglenav ? 'block' : 'hidden'">
								<div class="pt-2 pb-3">
									<a href="/" class="block pl-3 pr-4 py-2 border-l-4 border-indigo-500 text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out">Dashboard</a>
									<a href="/appointments" class="mt-1 block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">Appointments</a>
									<a href="/messages" class="mt-1 block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">Messages</a>
									<a href="/schedules" class="mt-1 block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">Schedules</a>
									<a href="/doctors" class="mt-1 block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">Doctors</a>
									<a href="/patients" class="mt-1 block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">Patients</a>
									<a href="/reports" class="cursor-pointer mt-1 block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">Reports</a>
								</div>
								<div class="pt-4 pb-3 border-t border-gray-200">
									<div class="flex items-center px-4">
										<div class="flex-shrink-0">
											<img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
										</div>
										<div class="ml-3">
											<div class="text-base font-medium leading-6 text-gray-800">{{ user.name }}</div>
											<div class="text-sm font-medium leading-5 text-gray-500">{{ user.email }}</div>
										</div>
									</div>
									<div class="mt-3" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
										<a to="/profile" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">Your Profile</a>
										<a to="/settings" class="mt-1 block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">Settings</a>
										<a href="#" class="mt-1 block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:text-gray-800 focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">Sign out</a>
									</div>
								</div>
							</div>
						</nav>
						<div>
						<header class="bg-indigo-500 mb-10 shadow-sm" >
							<div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
								<h1 class="text-lg leading-6 font-semibold text-white">
									{{ title }}
								</h1>
							</div>
						</header>
							<main>
                <slot/>
              </main>
						</div>
					<div class="bg-white mt-10" >
						<div class="max-w-screen-xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
							<nav class="-mx-5 -my-2 flex flex-wrap justify-center">
								<div class="px-5 py-2">
									<a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
										About
									</a>
								</div>
								<div class="px-5 py-2">
									<a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
										Blog
									</a>
								</div>
								<div class="px-5 py-2">
									<a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
										Jobs
									</a>
								</div>
								<div class="px-5 py-2">
									<a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
										Press
									</a>
								</div>
								<div class="px-5 py-2">
									<a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
										Accessibility
									</a>
								</div>
								<div class="px-5 py-2">
									<a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
										Partners
									</a>
								</div>
							</nav>
							<div class="mt-8 flex justify-center">
								<a href="#" class="text-gray-400 hover:text-gray-500">
									<span class="sr-only">Facebook</span>
									<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
										<path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
									</svg>
								</a>
								<a href="#" class="ml-6 text-gray-400 hover:text-gray-500">
									<span class="sr-only">Instagram</span>
									<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
										<path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"/>
									</svg>
								</a>
								<a href="#" class="ml-6 text-gray-400 hover:text-gray-500">
									<span class="sr-only">Twitter</span>
									<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
										<path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
									</svg>
								</a>
								<a href="#" class="ml-6 text-gray-400 hover:text-gray-500">
									<span class="sr-only">GitHub</span>
									<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
										<path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/>
									</svg>
								</a>
								<a href="#" class="ml-6 text-gray-400 hover:text-gray-500">
									<span class="sr-only">Dribbble</span>
									<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
										<path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd"/>
									</svg>
								</a>
							</div>
							<div class="mt-8">
								<p class="text-center text-base leading-6 text-gray-400">
									&copy; 2020 CareClick, Inc. All rights reserved.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
  </div>
</template>

<script>
import { mixin as clickaway } from 'vue-clickaway';
  export default {
    mixins: [ clickaway ],
    data(){
      return{
				noty:false,
				show: false,
				togglenav:false,
				user:[],
				active:'',
				title:''
			}
    },
		methods:{
			apiLogout(){
				let token = localStorage.getItem('token')
				if(token){
					axios.get('/api/auth/logout')
					.then(resp=>{
						if(resp.status == 200){
							localStorage.removeItem('token')
							this.webLogout()
						}
					})
				}
				this.webLogout()
			},
			webLogout(){
				axios.post('/logout')
				.then(resp=>{
					if(resp.status == 200){
						var base_url = window.location.origin
						window.location.replace(base_url + resp.data)
					}
				}).catch(err=>{
					console.log(err.response)
				})
      },
      away(){
        this.show = false
			},
			hideNoty(){
				this.noty = false
			}
    },
		mounted(){
			this.user = window.user,
			this.active = window.active
			this.title = window.title
		} 
  }
</script>

<style lang="scss" scoped>
  .slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .2s ease;
}
.slide-fade-enter { 
  transform: translateY(-50px);
  opacity: 0;
}
.slide-fade-leave-to {
 transform: translateY(-50px);
  opacity: 0; 
}
.notification_wrap{
	width: 500px;
	margin: 120px auto 0;
}

.notification_wrap .notification_icon{
	position: relative;
	width: 50px;
	height: 50px;
	font-size: 32px;
	margin: 0 auto;
	text-align: center;
	color: #605dff;
}

.notification_wrap .notification_icon .fa-bell{
	cursor: pointer;
}

.notification_wrap .dropdown{
	width: 350px;
	height: auto;
	background: #fff;
	border-radius: 5px;
	box-shadow: 2px 2px 3px rgba(0,0,0,0.125);
	margin: 15px auto 0;
	padding: 15px;
	position: relative;
	display: none;
}

.notification_wrap .dropdown .notify_item{
	display: flex;
	align-items: center;
	padding: 10px 0;
	border-bottom: 1px solid #dbdaff;
}

.notification_wrap .dropdown .notify_item:last-child{
	border-bottom: 0px;
}

.notification_wrap .dropdown .notify_item .notify_img{
	margin-right: 15px;
}

.notification_wrap .dropdown .notify_item .notify_info p{
	margin-bottom: 5px;
}

.notification_wrap .dropdown .notify_item .notify_info p span{
	color: #605dff;
	margin-left: 5px;
}

.notification_wrap .dropdown .notify_item .notify_info .notify_time{
	color: #c5c5e6;
	font-size: 12px;
}

.notification_wrap .dropdown:before{
	content: "";
	position: absolute;
	top: -30px;
	left: 50%;
	transform: translateX(-50%);
	border: 15px solid;
	border-color: transparent transparent #fff transparent;
}

.notification_wrap .dropdown.active{
	display: block;
}
</style>