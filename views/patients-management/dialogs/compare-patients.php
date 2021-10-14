<v-dialog v-model="ComparisonPatientsDialog" max-width="1200px">
    <v-card>
        <v-toolbar elevation="0">
            <v-toolbar-title>Comparar pacientes</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn icon dark @click="ComparisonPatientsDialog = false">
                    <v-icon color="grey">mdi-close</v-icon>
                </v-btn>
            </v-toolbar-items>
        </v-toolbar>

        <v-divider></v-divider>

        <v-card-text>
            <v-container fluid>
                <v-row>
                    <v-col cols="12" :md="comparison.type_selected == 1 ? 6 : 4">
                        <label for="">Tipo de comparación</label>
                        <v-select v-model="comparison.type_selected" :items="comparison.types">
                        </v-select>
                    </v-col>
                    <template v-if="comparison.type_selected == 1">
                        <v-col cols="12" md="6">
                            <label for="">Seleccione el paciente</label>
                            <v-select v-model="comparison.patient_to_compare" :items="patients"
                                :item-text=" (e) => e.first_name + ' ' + e.last_name" clearable return-object>
                            </v-select>
                        </v-col>
                    </template>
                    <template v-else>
                        <v-col cols="12" md="4">
                            <label for="">Seleccione la unidad</label>
                            <v-select v-model="comparison.type_selected" :items="comparison.types">
                            </v-select>
                        </v-col>
                        <v-col cols="12" md="4">
                            <label for="">Seleccione el paciente</label>
                            <v-select v-model="comparison.type_selected" :items="comparison.types">
                            </v-select>
                        </v-col>
                    </template>
                    <v-btn color="primary"
                        v-if="comparison.patient_to_compare !== undefined && comparison.patient_to_compare.hasOwnProperty('patient_id')"
                        @click="comparison.patient_selected = Object.assign({}, editedItem);viewPatientsComparisonDialog = true;initializeComparisonAppointments();"
                        block>Continuar</v-btn>
                </v-row>
            </v-container>
        </v-card-text>
    </v-card>
</v-dialog>