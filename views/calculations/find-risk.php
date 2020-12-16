    <!-- START AFTER THIS-->
    <v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
      <v-row>
        <?php echo new Template('parts/sidebar') ?>
        <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
          <v-row>
            <v-col cols="12" md="12">
              <h2 class="text-center">Fórmulario de FINDRISK</h2>
            </v-col>
            
          </v-row>
          <v-form>
            <v-row class="px-16 mx-auto">

              <v-col cols="12" md="12">
                <label>Paciente (Opcional)</label>
                <v-select class="mt-3" :items="patients" item-text="name" item-value="id" outlined ></v-select>
              </v-col>               


              <v-col cols="12" md="6">
                <label>Edad (años cumplidos)</label>
                <v-text-field class="mt-3" v-model="calc.age" :counter="3" outlined required ></v-text-field>
              </v-col>

              <v-col cols="12" md="6">
                <label>índice de Masa corporal(kg/m2)</label>
                <v-text-field class="mt-3" v-model="calc.bmi" hint="Ingrese la unidad en kg/m2" suffix="kg/m2" persistent-hint outlined required ></v-text-field>
              </v-col>    

              <v-col cols="12">
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="6">
                <label>Género</label>
                <v-select class="mt-3" v-model="calc.gender" :items="genders" item-text="gender" item-value="abbr" outlined required></v-select>
              </v-col>
                         
              <v-col cols="12" md="6">
                <label>Perímetro</label>
                <v-text-field class="mt-3" v-model="calc.perimeter" hint="Ingrese la unidad en cm" suffix="cm" persistent-hint outlined required ></v-text-field>
              </v-col>

              <v-col cols="12">
                <v-divider></v-divider>
              </v-col>

              <v-col cols="12" md="6">
                <label>¿El paciente realiza habitualmente (a diario) al menos 30 miuntos de actividad física en el trabajo y/o tiempo libre?</label>
                <v-select class="mt-3" v-model="calc.workout" outlined required></v-select>
              </v-col>  

              <v-col cols="12" md="6">
                <label>¿Con qué frecuencia el paciente consume verduras o frutas? <br><br></label>
                <v-select class="mt-3" v-model="calc.healthy_food" outlined required></v-select>
              </v-col>    
                           
              <v-col cols="12" md="6">
                <label>¿Al paciente le han encontrado alguna vez valors de glucosa altos? Por ejemplo, en un control médico, durante una enfermedad, durante el embarazo</label>
                <v-select class="mt-3" v-model="calc.high_glucose" outlined required></v-select>
              </v-col>   

              <v-col cols="12" md="6">
                <label>¿Se le ha diagnosticado diabetes (tipo 1 o 2) a alguno de sus familiares? Nota: la diabetes por edad o ya de viejo también cuenta</label>
                <v-select class="mt-3" v-model="calc.family_diabete" outlined required></v-select>
              </v-col>       

              <v-col cols="12">
                <v-btn class="white--text secondary" block rounded>Obtener Resultado del FINDRISK</v-btn>
              </v-col>

              <v-col cols="12" md="4" offset-md="4">
                <label class="text-center result-label">Resultado</label>
                <v-text-field class="mt-3 result-box" outlined readonly required ></v-text-field>
              </v-col>  
              <v-col cols="12">
                <p class="text-center">El puntuaje máximo es de 26 puntos. Si la puntuación es >= 12, hay una alta probabilidad de tener diabetes mellitus de tipo 2 u otra anormalidad de la reguliacíón glucosa.</p>
              </v-col>
            </v-row>
          </v-form>
        </v-col>
      </v-row>
    </v-container>
  </v-main>