
                                  <v-col cols="12">
                                      <v-row>
                                        <v-col cols="12" md="6">
                                          <v-data-table :headers="patient_laboratory_exams.headers" :items="patient_laboratory_exams.exams" class="elevation-1 full-width" :options="patient_laboratory_exams.table_options" hide-default-footer>
                                            <template v-slot:item.action="{ item }">
                                              <v-row class="mx-auto">
                                                <v-icon large color="primary" @click="showExamInfo(item)">
                                                  mdi-plus
                                                </v-icon>
                                              </v-row>
                                            </template>
                                            <template v-slot:no-data>
                                              <v-btn color="primary" @click="initializeExams" >
                                                Recargar
                                              </v-btn>
                                            </template>
                                          </v-data-table>
                                        </v-col>
                                        <v-col cols="12" md="6" v-if="patient_laboratory_exams.laboratory_exam">
                                          <h3 class="text-center text-h5 mb-4">Exámen de {{ patient_laboratory_exams.selectedExam.name }}</h3>
                                          <v-data-table :headers="views.patient_laboratory_exams.exam_headers" :items="patient_laboratory_exams.exam_results" sort-by="exam_date" sort-desc class="elevation-1 full-width">
                                            <template v-slot:item.results="{ item }">
                                              {{ item.results }} {{ patient_laboratory_exams.selectedExam.nomenclature }}
                                            </template>
                                            <template v-slot:no-data>
                                              No se encontraron resultados de exámenes
                                            </template>
                                          </v-data-table>

                                          <h3 class="text-center text-h5 mb-4 mt-5">Archivos </h3>
                                          <v-data-table :headers="views.patient_laboratory_exams.exam_file_headers" :items="patient_laboratory_exams.exam_files" sort-by="exam_date" sort-desc class="elevation-1 full-width">
                                            <template v-slot:item.file_result="{ item }">
                                              <a :href="'<?php echo SITE_URL ?>/public/exam-files/'+item.file_result" target="_blank">{{ item.file_result }}</a>
                                            </template>
                                            <template v-slot:no-data>
                                              No se encontraron resultados de archivos
                                            </template>
                                          </v-data-table>
                                        </v-col>
                                      </v-row>
                                  </v-col> 
