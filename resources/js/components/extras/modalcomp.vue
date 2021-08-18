<modal name="modal-card" :clickToClose="false" :adaptive="true" :height="250" :width="400" v-if="cardissue == true">
					<div>
						<div class="px-2 mt-6">
							<div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-indigo-400">
								<svg class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M9 12L11 14L15 10M20.6179 5.98434C20.4132 5.99472 20.2072 5.99997 20 5.99997C16.9265 5.99997 14.123 4.84453 11.9999 2.94434C9.87691 4.84446 7.07339 5.99985 4 5.99985C3.79277 5.99985 3.58678 5.9946 3.38213 5.98422C3.1327 6.94783 3 7.95842 3 9.00001C3 14.5915 6.82432 19.2898 12 20.622C17.1757 19.2898 21 14.5915 21 9.00001C21 7.95847 20.8673 6.94791 20.6179 5.98434Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</div>
							<p class="block text-sm font-medium leading-5 text-center text-gray-700 mb-2 mt-4">You will be redirected to your card issuer's verification page to complete this payment.</p>
							<div class="flex justify-center mt-4 px-4">
								<button @click="cardIssue" class="w-full bg-white text-center bg-indigo-500 hover:bg-indigo-700 rounded-md text-white px-4 py-2 border border-transparent text-sm leading-5 font-medium">Proceed</button>
							</div>
						</div>	
					</div>	
				</modal>	
				<modal name="modal-otp" :clickToClose="false" :adaptive="true" :height="error500 == true || cardfail == true ? 250 : 350" :width="400">
					<div>
						<div v-if="error500 == false">
								<div class="mt-10" v-if="cardfail == false">
								<div v-if="checkotpmodal == true">
								<div>
									<Icon name="key" class="h-24 w-24 mx-auto bg-white rounded-full shadow p-6"/>
								</div>  
								<div class="mt-6 px-4">
									<div class="mx-auto">
										<p class="font-semibold text-lg lg:text-2xl text-center">{{otpmsg}}</p>
									</div>
									<div class="relative rounded-md shadow-sm mb-6">
										<label class="block text-sm font-medium leading-5 text-center text-gray-700 mb-2">
											{{ chargeResponseMessage }}
										</label>
										<span>
											<input name="otp" v-model="verify.otp" class="form-input block text-center w-full sm:text-sm sm:leading-5" placeholder="Enter OTP" />
										</span>
									</div>
									<div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
										<span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:col-start-1">
											<button @click="validateotp" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-indigo-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition ease-in-out duration-150 sm:text-sm sm:leading-5">
												<span v-if="!submitting">Approve</span>
												<loading v-if="submitting" fill="fff" width="56"/>
											</button>
										</span>
										<span class="flex w-full rounded-md shadow-sm sm:col-start-2">
											<button @click="hideModalOtp" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline transition ease-in-out duration-150 sm:text-sm sm:leading-5">
												Cancel
											</button>
										</span>
									</div>
								</div>	
							</div> 
							<transition name="slide-fade">
								<div v-if="checkotpmodal == false">
									<div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100">
										<svg class="h-6 w-6 text-green-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
										</svg>
									</div>
									<div class="mx-auto mt-6">
										<p class="text-center text-lg leading-6 font-medium text-gray-900 py-2">{{successMessage}}</p>
										<p class="text-sm leading-5 text-gray-500 text-center px-2">Hurray!!! You are now a subscriber. You can now have unlimited access with our doctors</p>
									</div>
									<div class="flex justify-center mt-4 px-4">
										<a to="/login" class="w-full bg-white text-center bg-indigo-500 hover:bg-indigo-700 rounded-md text-white px-4 py-2 border border-transparent text-sm leading-5 font-medium">Login</a>
									</div>
								</div>	
							</transition>	
							</div> 
							<div v-if="cardfail == true">
								<div class="mt-10">
									<div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-100">
										<svg class="h-6 w-6 text-red-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
										</svg>
									</div>
									<div>
										<p class="text-center text-lg leading-6 font-medium text-gray-900 py-2">Payment was unsuccessful</p>
									</div>
									<div class="mx-auto">
										<p class="text-sm leading-5 text-gray-500 text-center px-2">{{cardfailMessage}}</p>
									</div>
									<div class="flex justify-center mt-4 px-4">
										<button @click="closeModalReset" class="w-full bg-white bg-indigo-500 hover:bg-indigo-700 rounded-md text-white px-4 py-2 border border-transparent text-sm leading-5 font-medium">Try again</button>
									</div>
								</div>
							</div>
						</div>
						<div v-if="error500 == true">
							<div class="px-4 pt-5 pb-4 overflow-hidden transform transition-all sm:max-w-lg sm:w-full sm:p-6">
								<div>
									<div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
										<svg class="h-6 w-6 text-red-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
										</svg>
									</div>
									<div class="mt-3 text-center sm:mt-5">
										<h3 class="text-lg leading-6 font-medium text-gray-900">
											Payment was unsuccessful
										</h3>
										<div class="mt-2">
											<p class="text-sm leading-5 text-gray-500">
												We are unable to process this card, please provide another card detail.
											</p>
										</div>
									</div>
								</div>
								<div class="mt-5 sm:mt-6">
									<span class="flex w-full rounded-md shadow-sm">
										<button @click="closeModalReset" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-indigo-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition ease-in-out duration-150 sm:text-sm sm:leading-5">
											Try another card
										</button>
									</span>
								</div>
								</div>
						</div>		
					</div>	
				</modal>