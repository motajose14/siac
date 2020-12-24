/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      patients: 
      [
        {
          name: 'John Doe',
          id: 1
        },
        {
          name: 'Sam Smith',
          id: 2
        }
      ],
      european_score: [
        {
          region: 'Sudeste asiático',
          factor: 1.4
        },
        {
          region: 'África Subsahariana',
          factor: 1.3
        },
        {
          region: 'Caribe',
          factor: 1.3
        },
        {
          region: 'Asia Occidental',
          factor: 1.2
        },
        {
          region: 'Norte de África',
          factor: 0.9
        },
        {
          region: 'Asia Oriental',
          factor: 0.7
        },
        {
          region: 'Ámerica del Sur',
          factor: 0.7000000000000001
        },
      ],
      table: [
        {
          valuation: 'Riesgo Bajo',
          points: '< 4'
        },
        {
          valuation: 'Riesgo moderado',
          points: '5 - 9'
        },
        {
          valuation: 'Riesgo alto',
          points: '>= 10'
        },
      ],
      genders: [
        {
          gender: 'Masculino',
          abbr: 'M'
        },
        {
          gender: 'Femenino',
          abbr: 'F'
        }
      ],
      smoking_options: [
        {
          text: 'Nunca fumó',
          val: 0,
        },
        {
          text: 'Exfumador',
          val: 2,
        },
        {
          text: 'Fumador actual o en los últimos 12 meses',
          val: 'Fumador actual',
        },
      ],
      smoking_amount: [
        {
          text: '1.5 cig/d',
          val: 2,
        },
        {
          text: '6 a 10 cig/d',
          val: 4,
        },
        {
          text: '11 a 15 cig/d',
          val: 6,
        },
        {
          text: '16 a 20 cig/d',
          val: 7,
        },
        {
          text: '> 20 cig/d',
          val: 11,
        },
      ],
      smoking_exposition: [
        {
          text: '< 1h exposición/semana o no exposición',
          val: 0,
        },
        {
          text: '> 1h exposición/semana',
          val: 2,
        },
      ],
      diabete: [
        {
          text: 'Sí',
          val: 6,
        },
        {
          text: 'No',
          val: 0,
        },
      ],
      hipertension: [
        {
          text: 'Sí',
          val: 5,
        },
        {
          text: 'No o desconozco',
          val: 0,
        },
      ],
      parents_ha_history: [
        {
          text: 'Sí',
          val: 4,
        },
        {
          text: 'No o desconozco',
          val: 0,
        },
      ],
      waist_index: [
        {
          text: 'Q1: < 0.873',
          val: 0,
        },
        {
          text: 'Q2: 0.873 - 0.963',
          val: 2,
        },
        {
          text: 'Q4: > 0.964',
          val: 4,
        },
      ],
      stress_frecuency: [
        {
          text: 'Nunca o algunos períodos',
          val: 0,
        },
        {
          text: 'Muchos períodos de estrés permanente',
          val: 3,
        },
      ],
      free_time_activity: [
        {
          text: 'Soy sedentario o realizo actividad física mínima',
          val: 2,
        },
        {
          text: 'Realizo actividad física moderada o intensa en mi tiempo libre',
          val: 0,
        },
      ],
      true_false: [
        {
          text: 'Sí',
          val: 1
        },
        {
          text: 'No',
          val: 0
        },
      ],
      vars: {
        region: 0.7,
        age: 1,
        gender: 0,
        smoking: 0,
        smoking_amount: 0,
        smoking_exposition: 0,
        diabetes: 0,
        hipertension: 0,
        parents_ha_history: 0,
        waist_index: 0,
        stress_frecuency: 0,
        free_time_activity: 0,
        salt_snack_food_daily: 0,
        fast_food_weekly: 0,
        eat_fruits: 0,
        eat_vegetables: 0,
        eat_meat: 0,
      },
    },

    computed: {
      calc () {
        var region = this.vars.region
        var age = this.ageScore()
        var smoking = this.smokingScore()
        var diabete = this.vars.diabetes
        var hipertension = this.vars.hipertension
        var parents_ha_history = this.vars.parents_ha_history
        var waist_index = this.vars.waist_index
        var stress_frecuency = this.vars.stress_frecuency
        var free_time_activity = this.vars.free_time_activity
        var salt_snack_food_daily = this.vars.salt_snack_food_daily
        var fast_food_weekly = this.vars.fast_food_weekly
        var eat_fruits = this.vars.eat_fruits
        var eat_vegetables = this.vars.eat_vegetables
        var eat_meat = this.vars.eat_meat
        console.log([{region: region, age: age, smoking: smoking, diabete: diabete,
          hipertension: hipertension, parents_ha_history: parents_ha_history, waist_index: waist_index,
          stress_frecuency: stress_frecuency, free_time_activity: free_time_activity, 
          salt_snack_food_daily: salt_snack_food_daily, fast_food_weekly: fast_food_weekly,
          eat_fruits: eat_fruits, eat_vegetables: eat_vegetables, eat_meat: eat_meat 
        }])
        return Math.round((
          age + smoking + diabete + hipertension + parents_ha_history + 
          waist_index + stress_frecuency + free_time_activity + salt_snack_food_daily + 
          fast_food_weekly + eat_fruits + eat_vegetables + eat_meat / 13) * region)
      }
    },

    created () {
    },

    mounted () {
    },

    methods: {
      ageScore () {
        var gender = this.vars.gender
        var age = this.vars.age

        if (gender == 'M' && age >= 55 || gender == 'F' && age == 65) 
          return 2
        return 0
      },

      smokingScore () {
        var smoking = this.vars.smoking
        var smoking_amount = this.vars.smoking_amount
        if (smoking == 'Fumador actual') {
          return smoking_amount
        }
        else{
          return smoking
        } 
      },

    }
});