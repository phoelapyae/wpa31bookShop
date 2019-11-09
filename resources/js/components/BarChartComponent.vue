<script>
import { Line, Bar, Pie } from 'vue-chartjs';

export default {
   extends: Bar,
   mounted() {
         let uri = 'http://localhost:8000/backend/orders/data';
         let Dates = new Array();
         let Labels = new Array();
         let bookNumbers = new Array();
         this.axios.get(uri).then((response) => {
            let data = response.data.data;
            if(data) {
               data.forEach(element => {
                    Dates.push(element.created_at);
                    Labels.push(element.city);
                    bookNumbers.push(element.number);
               });
               this.renderChart({
               labels: Dates,
               datasets: [{
                  label: 'Rate of book orders',
                  fillColor: 'rgb(255,255,255,0.25)',
                  data: bookNumbers
                }]
         }, {responsive: true, maintainAspectRatio: false})
       }
       else {
          console.log('No data');
       }
      });            
   }
}
</script>