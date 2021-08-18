<template>
  <div>
    <modal name="transactionerror" @before-open="beforeOpen " :scrollable="true" :adaptive="true" height="auto" :width="400" :clickToClose="false">
      <div>
				<div class="px-6 py-5 overflow-hidden transform transition-all sm:p-6">
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
                  {{ message }}
								</p>
                <!-- <p class="text-sm leading-5 text-gray-500">
									We are unable to process this card, please provide another card detail.
								</p> -->
							</div>
						</div>
					</div>
					<div class="mt-5 sm:mt-6">
						<span class="flex w-full rounded-md shadow-sm">
							<button @click.prevent="closeErrorModal" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-indigo-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition ease-in-out duration-150 sm:text-sm sm:leading-5">
								Try another card
							</button>
						</span>
					</div>
				</div>
			</div>
    </modal>
  </div>
</template>

<script>
  export default {
    data(){
      return{
        message:''
      }
    },
    
    methods:{
      beforeOpen(event){
        this.message = event.params.message
      },
      closeErrorModal(){
        this.$emit('closeTransactionError')
      }
    }

  }
</script>

<style lang="scss" scoped>

</style>