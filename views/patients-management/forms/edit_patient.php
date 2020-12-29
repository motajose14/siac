
													    <v-tabs v-model="tab" show-arrows fixed-tabs>

													      <v-tab class="font-weight-bold" href="#tab-1" @click="general_save = true">
													        Información general
													      </v-tab>

													      <v-tab class="font-weight-bold" href="#tab-2" @click="initializeAppointments">
													        Citas 
													      </v-tab>

													      <v-tab class="font-weight-bold" href="#tab-3" @click="initializeAnthropometry">
													        Antropometría
													      </v-tab>

													      <v-tab class="font-weight-bold" href="#tab-4" @click="general_save = false">
													        Signos Vitales
													      </v-tab>

													      <v-tab class="font-weight-bold" href="#tab-5">
													        Antecedentes
													      </v-tab>

													      <v-tab class="font-weight-bold" href="#tab-6" @click="initializeExams">
													        Exámenes de <br>laboratorio
													      </v-tab>

													      <v-tab class="font-weight-bold" href="#tab-7">
													        Diagnósticos: <br>Factores de Riesgo
													      </v-tab>
													    </v-tabs>
															<v-tabs-items v-model="tab">
																<?php $i = 0; ?>
																<?php foreach ($data['tabs'] as $tab_item): ?>
																<?php $i++; ?>
															  <v-tab-item transition="scroll-y-reverse-transition" :value="'tab-<?php echo $i;?>'">
															  	<v-container fluid>
															  		
															  		<v-row>
															      <?php echo new Template('patients-management/form_tabs/'. $tab_item) ?>
															  		</v-row>
															  		
															  	</v-container>
															  </v-tab-item>
																<?php endforeach ?>
															</v-tabs-items>
													   
