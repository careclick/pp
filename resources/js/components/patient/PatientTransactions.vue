<template>
  <div class="mb-48">
    <table class="min-w-full">
      <thead>
        <tr>
          <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
            TxRef
          </th>
          <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
            Amount
          </th>
          <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
            Payment Type
          </th>
          <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
            Status
          </th>
          <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
            Date
          </th>
        </tr>
      </thead>
      <tbody class="bg-white">
        <tr v-for="transaction in user.transactions" :key="transaction.id">
          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium text-gray-900">
            {{ transaction.txref }}
          </td>
          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
           &#x20A6; {{ transaction.amount }}
          </td>
          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
            {{ transaction.paymenttype }}
          </td>
          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
            <span v-if="transaction.status == 'success'" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-green-100 text-green-800">
              Success
            </span>
            <span v-else class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-red-100 text-red-800">
              Failed
            </span>
          </td>
          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
            {{ transaction.created_at | date }}
          </td>
        </tr>
      </tbody>
    </table>    
  </div>
</template>

<script>
  export default {
    data(){
      return{
        user:[]
      }
    },
    mounted(){
      this.user = window.user
    }
  }
</script>

<style lang="scss" scoped>

</style>