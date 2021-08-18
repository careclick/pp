<template>
    <div>
				<div class="mt-10 sm:mt-0">
					<div class="max-w-4xl mx-auto">
						<div class="mt-5 md:mt-0 md:col-span-2">
							<form>
								<div class="shadow overflow-hidden sm:rounded-md">
									<div class="px-4 py-5 bg-white sm:p-6">
										<div class="sm:mx-auto sm:w-full sm:max-w-md">
											<img class="mx-auto h-16 w-auto mb-8" src="https://careclick.healthcare/wp-content/uploads/2019/12/cropped-CareClick-official-new-logo.png" alt="CareClick" />
										</div>

										<div class="grid grid-cols-6 gap-6">
											<div class="col-span-6 sm:col-span-6 lg:col-span-3">
												<label class="block text-sm font-medium leading-5 text-gray-700">First name</label>
												<input placeholder="First name" :class="$v.form.firstname.$error ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'" v-model="$v.form.firstname.$model" class="mt-1 form-input block w-full py-2 px-3 border rounded-md shadow-sm focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.form.firstname.required && $v.form.firstname.$error"
												>The first name field is required</p>
											</div>

											<div class="col-span-6 sm:col-span-6 lg:col-span-3">
											<label class="block text-sm font-medium leading-5 text-gray-700">Last name</label>
												<input placeholder="Last name" :class="$v.form.lastname.$error ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'" v-model="$v.form.lastname.$model" class="mt-1 form-input block w-full py-2 px-3 border rounded-md shadow-sm focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.form.lastname.required && $v.form.lastname.$error"
												>The last name field is required</p>
											</div>

											<div class="col-span-6 sm:col-span-6 lg:col-span-2">
												<label for="email" class="block text-sm font-medium leading-5 text-gray-700">Username</label>
												<div class="mt-1 relative rounded-md shadow-sm">
												<input placeholder="Username" :class="$v.form.username.$error || checkUsername == !false && form.username.length >= 4 && !checkingUsername ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'" v-model="$v.form.username.$model" class="mt-1 form-input block w-full py-2 px-3 border rounded-md shadow-sm focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
													<div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
														<svg v-if="checkUsername == !false && form.username.length >= 4 && !checkingUsername" class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
															<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
														</svg>
														<svg v-if="checkUsername == !true  && form.username.length >= 4 && !checkingUsername" class="text-green-500 fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.25 16.518l-4.5-4.319 1.396-1.435 3.078 2.937 6.105-6.218 1.421 1.409-7.5 7.626z"/></svg>
														<loading v-if="checkingUsername && form.username.length >= 4" fill="5a67d8" width="60"/>
													</div>
												</div>
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.form.username.required && $v.form.username.$error"
												>The username is required</p>
												<p class="text-red-500 text-xs  mt-1"
												v-if="!$v.form.username.minLength && $v.form.username.$error"
												>The username field must have at least {{ $v.form.username.$params.minLength.min }} characters.</p>
											</div>

											<div class="col-span-6 sm:col-span-6 lg:col-span-2">
												<label for="password" class="block text-sm font-medium leading-5 text-gray-700">Password</label>
												<input placeholder="Password" type="password" :class="$v.form.password.$error ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'" v-model="$v.form.password.$model" class="mt-1 form-input block w-full py-2 px-3 border rounded-md shadow-sm focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.form.password.required && $v.form.password.$error"
												>The password is required</p>
												<p class="text-red-500 text-xs  mt-1"
												v-if="!$v.form.password.minLength && $v.form.password.$error"
												>The password field must have at least {{ $v.form.password.$params.minLength.min }} characters.</p>
											</div>

											<div class="col-span-6 sm:col-span-6 lg:col-span-2">
												<label for="confirm_password" class="block text-sm font-medium leading-5 text-gray-700">Confirm Password</label>
												<input placeholder="Confirm Password" type="password" :class="$v.form.confirm_password.$error && form.password.length >= 4 ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'" v-model="$v.form.confirm_password.$model" class="mt-1 form-input block w-full py-2 px-3 border rounded-md shadow-sm focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.form.confirm_password.required && $v.form.confirm_password.$error"
												>The confirm password field is required</p>
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.form.confirm_password.sameAs && $v.form.confirm_password.$error && form.password.length >= 4"
												>This password does not match.</p>
											</div>

											<div class="col-span-6 sm:col-span-6 lg:col-span-3">
												<label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email address</label>
												<div class="mt-1 relative rounded-md shadow-sm">
												<input placeholder="Email address" :class="$v.form.email.$error || checkEmail == !false && form.email.length >= 4 && !checkingEmail ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'" v-model="$v.form.email.$model" class="mt-1 form-input block w-full py-2 px-3 border rounded-md shadow-sm focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
													<div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
														<svg v-if="checkEmail == !false && !checkingEmail" class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
															<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
														</svg>
														<svg v-if="checkEmail == !true  && form.email.length >= 4 && !checkingEmail && $v.form.email.email" class="text-green-500 fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.25 16.518l-4.5-4.319 1.396-1.435 3.078 2.937 6.105-6.218 1.421 1.409-7.5 7.626z"/></svg>
														<loading v-if="checkingEmail && form.email.length >= 4 " fill="5a67d8" width="60"/>
													</div>
												</div>
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.form.email.required && $v.form.email.$error"
												>The email is required</p>
												<p class="text-red-500 text-xs  mt-1"
												v-if="!$v.form.email.email && $v.form.email.$error"
												>This field must an email.</p>
											</div>

											<div class="col-span-6 sm:col-span-6 lg:col-span-3">
												<label for="phone" class="block text-sm font-medium leading-5 text-gray-700">Phone</label>
												<input placeholder="Phone" :class="$v.form.phone.$error ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'" v-model="$v.form.phone.$model" class="mt-1 form-input block w-full py-2 px-3 border rounded-md shadow-sm focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.form.phone.required && $v.form.phone.$error"
												>The phone field is required</p>
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.form.phone.numeric && $v.form.phone.$error"
												>This phone field must be numeric.</p>
											</div>
											<div class="col-span-6 sm:col-span-6 lg:col-span-3">
												<label for="dob" class="block text-sm font-medium leading-5 text-gray-700">Date of Birth</label>
												<date-picker lang="en" type="date" format="DD-MM-YYYY" placeholder="Date of Birth" input-class="mt-1 form-input block w-full py-2 px-3 border border-gray-300
												 rounded-md shadow-sm w-full focus:outline-none focus:shadow-outline-blue focus:border-blue-300
												  transition duration-150 ease-in-out sm:text-sm sm:leading-5" :value="form.dob"
													v-model="$v.form.dob.$model" 
													></date-picker>
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.form.dob.required && $v.form.dob.$error"
												>The date of birth field is required</p>
											</div>
											<div class="col-span-6 sm:col-span-6 lg:col-span-3">
												<label for="country" class="block text-sm font-medium leading-5 text-gray-700">Gender</label>
												<select v-model="$v.form.gender.$model" :class="$v.form.gender.$error ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'" class="mt-1 block form-select w-full py-2 px-3 py-0 border bg-white rounded-md shadow-sm focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5">
													<option value="" selected>Select your gender</option>
													<option>Male</option>
													<option>Female</option>
												</select>
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.form.gender.required && $v.form.gender.$error"
												>The gender field is required</p>
											</div>
											<div class="col-span-6 sm:col-span-6 lg:col-span-3">
												<label for="country" class="block text-sm font-medium leading-5 text-gray-700">Country / Region</label>
												<select @change="getStates()" :class="$v.form.country.$error ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'" v-model="$v.form.country.$model" id="country" class="mt-1 block form-select w-full py-2 px-3 py-0 border bg-white rounded-md shadow-sm focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5">
													<option value="" selected>Select a country</option>
													<option v-for="country in orderedCountries" :key="country.id" :value="{ id: country.id, name: country.name }">{{ country.name }}</option>
												</select>
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.form.country.required && $v.form.country.$error"
												>The country field is required</p>
											</div>
											<div class="col-span-6 sm:col-span-6 lg:col-span-3">
												<label for="state" class="block text-sm font-medium leading-5 text-gray-700">State</label>
												<select v-model="$v.form.state.$model" :class="$v.form.state.$error ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'" class="mt-1 block form-select w-full py-2 px-3 py-0 border bg-white rounded-md shadow-sm focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5">
													<option value="" selected>Select a state</option>
													<option 
													v-for="state in orderedStates"
                    			:value="{ id: state.id, name: state.name }"
                    			:key="state.id">
													{{ state.name }}
													</option>
												</select>	
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.form.state.required && $v.form.state.$error"
												>The state field is required</p>
											</div>

											<div class="col-span-6">
												<label for="street_address" class="block text-sm font-medium leading-5 text-gray-700">Street address</label>
												<input placeholder="Street address" :class="$v.form.address.$error ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'" v-model="$v.form.address.$model" class="mt-1 form-input block w-full py-2 px-3 border rounded-md shadow-sm focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.form.address.required && $v.form.address.$error"
												>The address field is required</p>
											</div>

											<div class="col-span-6">
												<label class="block text-sm font-medium leading-5 text-gray-700">Select a plan</label>
												<select @change="onChange($event)" v-model="$v.card.amount.$model" :class="$v.card.amount.$error ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'" class="mt-1 block form-select w-full py-2 px-3 py-0 border bg-white rounded-md shadow-sm focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5">
													<option value="">Choose a plan</option>
													<option value="1000">Monthly</option>
													<option value="10000">Yearly</option>
												</select>
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.card.amount.required && $v.card.amount.$error"
												>Choose a plan</p>
											</div>
											<div class="col-span-6 border-b pb-2 border-gray-200">
												<h3 class="text-lg leading-6 font-medium text-gray-900">
													Billing Information
												</h3>
												<div class="flex items-center justify-between">
													<p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
														Don't worry, your card information will never directly our servers.
													</p>
													<div>
														<ul class="flex items-center">
															<li>
																<Icon name="visa" class="w-10"/>
															</li>
															<li class="ml-2">
																<Icon name="mastercard" class="w-10"/>
															</li>
														</ul>	
													</div>		
												</div>	
											</div>
											<div class="col-span-6 sm:col-span-6 lg:col-span-2">
												<label for="email" class="block text-sm font-medium leading-5 text-gray-700">Card Number</label>
												<div class="mt-1 relative rounded-md shadow-sm">
													<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
														<icon v-if="getCardType() == ''" name="card" class="w-5 h-5 fill-current text-gray-400"/>
														<icon v-if="getCardType() == 'visa'" name="visa" class="mt-3 -ml-2 w-8 h-8"/>
														<icon v-if="getCardType() == 'mastercard'" name="mastercard" class="mt-3 -ml-2 w-8 h-8"/>
														<icon v-if="getCardType() == 'discover'" name="discover" class="mt-3 -ml-2 w-8 h-8"/>
														<icon v-if="getCardType() == 'amex'" name="amex" class="mt-3 -ml-2 w-8 h-8"/>
													</div>
													<input placeholder="Card Number" :class="$v.card.card_number.$error ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'"
													v-model="$v.card.card_number.$model" class="mt-1 form-input block w-full py-2 px-3 border rounded-md 
													shadow-sm focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5 pl-10" />
												</div>
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.card.card_number.required && $v.card.card_number.$error"
												>The card number field is required</p>
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.card.card_number.numeric && $v.card.card_number.$error"
												>This card number field must be numeric.</p>
											</div>
											<div class="col-span-6 sm:col-span-6 lg:col-span-2">
												<label for="email" class="block text-sm font-medium leading-5 text-gray-700">Expiration Date</label>
												<div class="mt-1 relative rounded-md shadow-sm">
													<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
														<icon name="calender" class="w-4 h-4 fill-current text-gray-400"/>
													</div>
													<input maxlength='5' @keyup="formatString" placeholder="MM/YY" :class="$v.card.exp_date.$error ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'"
													v-model="$v.card.exp_date.$model" class="mt-1 form-input block w-full py-2 px-3 border rounded-md 
													shadow-sm focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5 pl-10" />
													</div>
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.card.exp_date.required && $v.card.exp_date.$error"
												>The expiration date field is required</p>
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.card.exp_date.valid && $v.card.exp_date.$error"
												>This expiration date is invalid.</p>
											</div>
											<div class="col-span-6 sm:col-span-6 lg:col-span-2">
												<label for="email" class="block text-sm font-medium leading-5 text-gray-700">CVV</label>
												<div class="mt-1 relative rounded-md shadow-sm">
													<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
														<icon name="cvv" class="w-5 h-5 fill-current text-gray-400"/>
													</div>
													<div class="form-input flex" :class="$v.card.pin.$error || $v.card.cvv.$error ? 'border-red-300 outline-none focus:shadow-outline-red focus:border-red-300' : 'border-gray-300 focus:shadow-outline-blue focus:border-blue-300'">
														<input maxlength="3" placeholder="CVV" v-model="$v.card.cvv.$model" class="inline w-1/2 pl-7 sm:text-sm sm:leading-5 outline-none" />
														<input maxlength="4" type="password" placeholder="PIN" v-model="$v.card.pin.$model" class="inline w-1/2 pl-7 sm:text-sm sm:leading-5 outline-none" />
													</div>
												</div>
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.card.cvv.required && $v.card.cvv.$error"
												>The cvv field is required</p>
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.card.cvv.numeric && $v.card.cvv.$error"
												>This cvv field must be numeric.</p>
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.card.pin.required && $v.card.pin.$error"
												>The pin field is required</p>
												<p class="text-red-500 text-xs  mt-1"
													v-if="!$v.card.pin.numeric && $v.card.pin.$error"
												>This pin field must be numeric.</p>
											</div>
										</div>
										<div class="py-8">
											<div class="flex justify-center items-start">
												<div class="flex items-center h-5">
												<input :class="!$v.form.tc.required && $v.form.tc.$error ? 'border border-red-500' : ' '" v-model.trim="$v.form.tc.$model" @change="$v.form.tc.$touch()" type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
												</div>
												<div class="text-sm pl-2 leading-5">
													<p class="text-gray-700">I agree to <a href="#" class="text-indigo-500 hover:text-indigo-700">Terms and Conditions</a> and <a href="#" class="text-indigo-500 hover:text-indigo-700">Privacy Policy</a>.</p>
												</div>
											</div>
											<div>
												<p class="text-red-500 text-xs  mt-1 text-center"
												v-if="!$v.form.tc.required && $v.form.tc.$error"
											>The terms and conditions field is required</p>
											</div>	
										</div>
									</div>	
									<div class="flex items-center justify-between px-4 py-3 bg-gray-50 text-right sm:px-6">
										<div>
											<p class="text-gray-700">Already have an account? <a href="/login" class="text-indigo-500 hover:text-indigo-700">Login</a></p>
										</div>
										<div>
											<button @click.prevent="validateForm" class="h-10 py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out">
												<span>Subscribe</span>
												<!-- <loading v-if="loading" fill="fff" width="68"/> -->
											</button>
										</div>
									</div>	
								</div>
							</form>
						</div>
					</div>
				</div>
				<auth-model name="authmodel" :authUrl="authModelCheck"/>
				<transaction-error name="transactionerror" @closeTransactionError="closeErrorModalReset"/>
				<vue-snotify></vue-snotify>
	    </div>
</template>

<script>
import loading from './extras/Loading'
import DatePicker from 'vue2-datepicker';
import _ from "lodash"
import axios from 'axios'
import moment from 'moment'
import Icon from './extras/Icon'
import AuthModel from './extras/modals/AuthModel'
import TransactionError from './extras/modals/TransactionError'
import {
  required,
  minLength,
  numeric,
  email,
  sameAs
} from "vuelidate/lib/validators";

export default {
		components:{
			loading,
			DatePicker,
			Icon,
			AuthModel,
			TransactionError
		},
		data(){
			return{
				form:{
					firstname: "",
					lastname: "",
					email: "",
					username: "",
					dob: "",
					gender: "",
					phone: "",
					country: "",
					state: "",
					address: "",
					amount: "",
					password: "",
					confirm_password: "",
					plan: "",
					tc: "",
					role: "patient",
				},
				card:{
					amount:"",
					card_number: "",
					exp_date: "",
					cvv: "",
					pin: "",
				},
				verify:{
					otp:'',
					transaction_reference:''
				},
				countries: [],
				states: [],
				checkUsername:null,
				checkingUsername:false,
				checkEmail:null,
				checkingEmail:false,
				authurl:null,
				txRef:'',
				loading:false,
				submitting:false,
				authModelCheck:'',
			}
		},
		validations: {
				form: {
					username: {
						required,
						minLength: minLength(4)
					},
					email: {
						required,
						email
					},
					password: {
						required,
						minLength: minLength(4)
					},
					confirm_password: {
						required,
						minLength: minLength(4),
						sameAsPassword: sameAs("password")
					},
					firstname: { required },
					lastname: { required },
					dob: { required },
					gender: { required },
					phone: { required, numeric },
					country: { required },
					state: { required },
					address: { required },
					plan: { required },
					tc: { checked: value => value === true }
				},
				card:{
					amount:{required},
					card_number: { required,numeric },
					exp_date: { required,
						 valid: value => {
								if (typeof value === 'undefined' || value === null || value === '') {
									return true
								}
								return new RegExp("^(0[1-9]|1[0-2]|[1-9])\/(1[4-9]|[2-9][0-9]|20[1-9][1-9])$").test(value)
							}
					 },
					cvv: { required,numeric },
					pin: { required,numeric },
				}
			},
		watch: {
			"form.username": {
				handler() {
					if (this.form.username.length > 0) {
						this.fetchUsername();
					}
				},
				deep: true
			},
			"form.email": {
				handler() {
					if (this.form.email.length > 0) {
						this.fetchEmail();
					}
				},
				deep: true
			}
		},
		  computed: {
				orderedCountries: function() {
					return _.orderBy(this.countries, "name", "asc");
				},
				orderedStates: function() {
					return _.orderBy(this.states, "name", "asc");
				},
				formatDate(date) {
					return moment(date).format('MMMM Do YYYY');
				},
				exp_first() {
					let str = this.card.exp_date
					return str.substring(' ',2);
				},
				exp_last() {
					let str = this.card.exp_date
					return str.slice(-2);
				},
				reference() {
					let text = "";
					let possible =
						"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

					for (let i = 0; i < 10; i++)
						text += possible.charAt(Math.floor(Math.random() * possible.length));

					return text;
				}
			},
			methods:{
				validateForm(){
				this.$v.$touch();
        if (this.$v.$invalid) {
          this.$snotify.error('Please fill the form correctly','Error');
        } else {
          this.pay()
        }
			},
			showModalOtp(){
        this.$modal.show('modal-otp');
      },
      hideModalOtp () {
        this.$modal.hide('modal-otp');
			},
			showModalCard(){
        this.$modal.show('modal-card');
      },
      hideModalCard () {
        this.$modal.hide('modal-card');
			},
			
			pay(){
				this.loading = true
				axios.post('/api/pay',{
						'PBFPubKey': process.env.MIX_PUBLIC_KEY,
						'cardno':this.card.card_number,
						'currency':'NGN',
						'country' : 'NG',
						'cvv' : this.card.cvv,
						'amount' : this.card.amount,
						'expirymonth' : this.exp_first,
						'expiryyear' : this.exp_last,
						'suggested_auth':'pin',
						'pin': this.card.pin,
						'txRef': this.reference,
						firstname: this.form.firstname,
						lastname: this.form.lastname,
						email: this.form.email,
						password: this.form.password,
						confirm_password: this.form.confirm_password,
						username: this.form.username,
						dob: this.form.dob,
						gender: this.form.gender,
						phone: this.form.phone,
						role: this.form.role,
						country: this.form.country.name,
						state: this.form.state.name,
						address: this.form.address,
						plan: this.form.plan,						
				}).then(resp=>{
					console.log(resp)
					if(resp.data.message == 'V-COMP' && resp.data.data.authModelUsed == 'VBVSECURECODE'){
						this.authModelCheck = resp.data.data.authurl
						this.$modal.show('authmodel')
						return
					}
					console.log('Pin')
						this.showModalCard()
						this.cardissueLink = resp.data.data.authurl
						this.loading = false
				}).catch(err=>{
					// if(err.response.status == 500){
					// 	this.error500 = true
					// 	this.showModalOtp()
					// 	this.loading=false
					// }
					// this.loading=false
					console.log(err.response)
				})
			},
			validateotp(){
				this.submitting = true
				axios.post('https://api.ravepay.co/flwv3-pug/getpaidx/api/validatecharge',{
						'PBFPubKey':process.env.MIX_PUBLIC_KEY,
						'transaction_reference': this.verify.transaction_reference,
						'otp':this.verify.otp
					}).then(resp=>{
						
						if(resp.data.status == "success" && resp.data.data.responsecode == "00"){
							this.txRef = resp.data.data.tx.txRef
							this.verify_trans()
						}
						console.log(resp.data)
						this.cardfail = true
						this.cardfailMessage = resp.data.data.data.responsemessage
					}).catch(err=>{
						console.log(err.response)
					})
			},
			verify_trans(){
				axios.post('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify',{
					'txref':this.txRef,
					'SECKEY': process.env.MIX_FL_SECRET
				}).then(resp=>{
					console.log(resp.data.data)
					if(resp.data.status == 'success' && resp.data.data.currency == 'NGN' && resp.data.data.amount == this.card.amount){
						console.log(resp.data.status)
						this.userRegister()
					}
				}).catch(err=>{
					console.log(err.response)
				})
			},
			userRegister(){
				axios.post('/api/auth/signup',{
					firstname: this.form.firstname,
          lastname: this.form.lastname,
          email: this.form.email,
          password: this.form.password,
          confirm_password: this.form.confirm_password,
          username: this.form.username,
          dob: this.form.dob,
          gender: this.form.gender,
          phone: this.form.phone,
          role: this.form.role,
          country: this.form.country.name,
          state: this.form.state.name,
          address: this.form.address,
          plan: this.form.plan,
				}).then(resp=>{
						if(resp.status == 200){
							this.checkotpmodal = false
							this.successMessage = "Payment was successful"
						}
				}).catch(err=>{
					console.log(err.response)
				})
			},
			cardIssue(){
				window.open(this.cardissueLink)
				this.hideModalCard()
			},
			closeErrorModalReset(){
				this.$modal.hide('transactionerror')
				this.getCountries()
				this.reset()
			},
			reset(){
        Object.assign(this.$data, this.$options.data.call(this));
			},

			getParameterByName(name, url) {
					if (!url) url = window.location.href;
					name = name.replace(/[\[\]]/g, '\\$&');
					var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
							results = regex.exec(url);
					if (!results) return null;
					if (!results[2]) return '';
					return decodeURIComponent(results[2].replace(/\+/g, ' '));
			},

			onChange(event) {
					if (event.target.value == 1000) {
						return (this.form.plan = 3249);
					} else {
						return (this.form.plan = 3848);
					}
				},
				fetchUsername: _.debounce(function() {
					this.checkingUsername = true;
						axios
							.get("/api/username", { params: { username: this.form.username } })
							.then(response => {
								if (response.data == true) {
									this.checkUsername = true;
								} else {
									this.checkUsername = false;
								}
								this.checkingUsername = false;
							})
							.catch(error => {});
					}, 300),

			fetchEmail: _.debounce(function() {
				this.checkingEmail = true;
					axios.get("/api/email", { params: { email: this.form.email } })
						.then(response => {
							if (response.data == true) {
								this.checkEmail = true;
							} else {
								this.checkEmail = false;
							}
							this.checkingEmail = false;
						})
						.catch(error => {});
				}, 300),
			getCountries() {
				axios.get("/api/getCountries").then(
						function(response) {
							this.countries = response.data;
						}.bind(this)
					);
				},

			getStates: function() {
				axios
					.get("/api/getStates", {
						params: {
							country_id: this.form.country.id
						}
					})
					.then(
						function(response) {
							this.states = response.data;
						}.bind(this)
					);
			},
			
			getCardType(){
					let number = this.card.card_number
				    // visa
					var re = new RegExp("^4");
					if (number.match(re) != null)
							return "visa";

					// Mastercard 
					// Updated for Mastercard 2017 BINs expansion
					if (/^(5[1-5][0-9]{14}|2(22[1-9][0-9]{12}|2[3-9][0-9]{13}|[3-6][0-9]{14}|7[0-1][0-9]{13}|720[0-9]{12}))$/.test(number)) 
							return "mastercard";

					// AMEX
					re = new RegExp("^3[47]");
					if (number.match(re) != null)
							return "amex";

					// Discover
					re = new RegExp("^(6011|622(12[6-9]|1[3-9][0-9]|[2-8][0-9]{2}|9[0-1][0-9]|92[0-5]|64[4-9])|65)");
					if (number.match(re) != null)
							return "discover";


					return "";
			},
			formatString(event){
					var inputChar = String.fromCharCode(event.keyCode);
					var code = event.keyCode;
					var allowedKeys = [8];
					if (allowedKeys.indexOf(code) !== -1) {
						return;
					}

					event.target.value = event.target.value.replace(
						/^([1-9]\/|[2-9])$/g, '0$1/' // 3 > 03/
					).replace(
						/^(0[1-9]|1[0-2])$/g, '$1/' // 11 > 11/
					).replace(
						/^([0-1])([3-9])$/g, '0$1/$2' // 13 > 01/3
					).replace(
						/^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2' // 141 > 01/41
					).replace(
						/^([0]+)\/|[0]+$/g, '0' // 0/ > 0 and 00 > 0
					).replace(
						/[^\d\/]|^[\/]*$/g, '' // To allow only digits and `/`
					).replace(
						/\/\//g, '/' // Prevent entering more than 1 `/`
					);
				},
			},
			created() {
				this.getCountries()
				Echo.channel('Registration.' + this.reference)
				.listen('RegisterUser', ({data}) => {
					this.$modal.hide('authmodel')
					if(data.authModelUsed == 'VBVSECURECODE' && data.authurl){
						if(data.status == 'failed'){
							this.$modal.show('transactionerror', {message: data.vbvrespmessage})
						}
						this.$modal.show('transactionsuccess', { message: data.vbvrespmessage })
						return
					}
					console.log(data)
				})
				
			},
			mounted(){
				// this.$modal.show('transactionerror', {message: 'data.vbvrespmessage'})
				// this.showModalCard()
				// this.checkotpmodal = !this.checkotpmodal
				// this.showModalOtp()
			  // setTimeout(()=>{
			 	//  this.submitting = !this.submitting
				//  },3000)
			}
  }
</script>

<style lang="scss">
@import '~vue2-datepicker/scss/index.scss';
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
</style>