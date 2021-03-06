<?php if (!empty($can_manage_suite) || !empty($access['patient_management_access']['sections'][0]['permissions']['update']) ): ?>
<v-col class="d-flex justify-end" cols="12">
    <v-btn color="#00BFA5" @click="editedIndex = editedViewIndex;dialog = true; view_dialog = false;tab = 'tab-5'" dark>
        Editar</v-btn>
</v-col>
<?php endif ?>
<v-col class="full-width px-0" cols="12">
    <v-row>
        <v-col class="font-weight-bold text-center" cols="8" offset="2">
            <v-row>
                <v-col cols="1"></v-col>
                <v-col cols="5">
                    <span class="font-weight-bold">Temperatura:
                        <span class="font-weight-light">
                            {{ patient_vital_signs.temperature }} °C
                        </span>
                    </span>
                    <template v-if="patient_vital_signs.records.length > 0 ">
                        <v-badge color="primary"
                            :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals').temperature.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals').temperature.percent)) + '%)'">
                        </v-badge>
                    </template>
                </v-col>
                <v-col cols="5">
                    <span class="font-weight-bold">SAT:
                        <span class="font-weight-light">
                            {{ patient_vital_signs.sat }}%
                        </span>
                        <template v-if="patient_vital_signs.records.length > 0">
                            <v-badge color="primary"
                                :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals').sat.numeric)) + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals').sat.percent)) + '%)'">
                            </v-badge>
                        </template>
                    </span>
                </v-col>
            </v-row>
        </v-col>
    </v-row>
    <v-row v-for="(item, index) in 3">
        <v-col cols="12" md="12">
            <h2 class="text-center">
                <template v-if="index == 0">
                    Sentado
                </template>
                <template v-if="index == 1">
                    Acostado
                </template>
                <template v-if="index == 2">
                    De pie
                </template>
            </h2>
        </v-col>
        <v-col class="mb-n12" cols="12">
            <v-row class="d-flex justify-center">
                <v-col class="font-weight-bold text-center" cols="12" md="3">
                    <v-row>
                        <v-col cols="12">
                            <span class="font-weight-bold">Frecuencia respiratoria:
                                <span class="font-weight-light">
                                    {{ patient_vital_signs.takes[index]['breathing_rate'] }} rpm
                                </span>
                                <template v-if="patient_vital_signs.records.length > 0">
                                    <v-badge class="ml-2" color="primary"
                                        :content="returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index}).take.br.numeric)) 
                                        + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index}).take.br.percent)) + '%)'">
                                    </v-badge>
                                </template>
                            </span>
                        </v-col>
                    </v-row>
                </v-col>
                <v-col class="font-weight-bold text-center" cols="12" md="3">
                    <v-row>
                        <v-col cols="12">
                            <span class="font-weight-bold">Frecuencia Cardíaca:
                                <span class="font-weight-light">
                                    {{ patient_vital_signs.takes[index]['frc'] }} lat x min
                                </span>
                                <template v-if="patient_vital_signs.records.length > 0">
                                    <v-badge class="ml-2" color="primary"
                                        :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index}).take.frc.numeric)) 
                                        + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index}).take.frc.percent)) + '%)'">
                                    </v-badge>
                                </template>
                            </span>
                        </v-col>
                    </v-row>
                </v-col>
        </v-col>
        <v-col cols="12">
            <v-row class="d-flex align-center justify-center">
                <v-col cols="12" md="8">
                    <v-row>
                        <v-col class="font-weight-bold text-center" cols="12" md="6">
                            PA brazo derecho *
                        </v-col>
                        <v-col class="font-weight-bold text-center" cols="12" md="6">
                            PA brazo izquierdo *
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
            <v-row class="d-flex align-center pt-0 mt-n10 justify-center">
                <v-col class="font-weight-bold text-center" cols="12" md="4">
                    <v-row v-bind:class="patient_vital_signs.records.length > 0 ? 'd-flex align-center' : ''">
                        <v-col cols="5">
                            <span class="font-weight-bold"> Promedio PAS:
                                <span class="font-weight-light">
                                    {{ patient_vital_signs.takes[index]['pa_right_arm1_average'] }} mmHg
                                </span>

                            </span>
                            <v-row class="mt-6 justify-center" v-if="patient_vital_signs.records.length > 0">
                                <v-badge class="ml-n10" color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_right_arm1_average'}).take.arm.numeric)) 
                                    + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_right_arm1_average'}).take.arm.percent)) + '%)'">
                                </v-badge>
                            </v-row>
                        </v-col>
                        <v-col cols="2">/</v-col>
                        <v-col cols="5">
                            <span class="font-weight-bold"> Promedio PAD:
                                <span class="font-weight-light">
                                    {{ patient_vital_signs.takes[index]['pa_right_arm2_average'] }} mmHg
                                </span>
                            </span>
                            <v-row class="mt-6 justify-center" v-if="patient_vital_signs.records.length > 0">
                                <v-badge class="ml-n10" color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_right_arm2_average'}).take.arm.numeric)) 
                                    + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_right_arm2_average'}).take.arm.percent)) + '%)'">
                                </v-badge>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-col>
                <v-col class="font-weight-bold text-center" cols="12" md="4">
                    <v-row v-bind:class="patient_vital_signs.records.length > 0 ? 'd-flex align-center' : ''">
                        <v-col cols="5">
                            <span class="font-weight-bold"> Promedio PAS:
                                <span class="font-weight-light">
                                    {{ patient_vital_signs.takes[index]['pa_left_arm1_average'] }} mmHg
                                </span>

                            </span>
                            <v-row class="mt-6 justify-center" v-if="patient_vital_signs.records.length > 0">
                                <v-badge class="ml-n10" color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_left_arm1_average'}).take.arm.numeric)) 
                                    + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_left_arm1_average'}).take.arm.percent)) + '%)'">
                                </v-badge>
                            </v-row>
                        </v-col>
                        <v-col cols="2">/</v-col>
                        <v-col cols="5">
                            <span class="font-weight-bold"> Promedio PAD:
                                <span class="font-weight-light">
                                    {{ patient_vital_signs.takes[index]['pa_left_arm2_average'] }} mmHg
                                </span>

                            </span>
                            <v-row class="mt-6 justify-center" v-if="patient_vital_signs.records.length > 0">
                                <v-badge class="ml-n10" color="primary"
                                    :content=" returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_left_arm2_average'}).take.arm.numeric)) 
                                    + ' (' + returnNumberSign(Math.round(getPercentDifference('vital-signals', {index: index, arm: 'pa_left_arm2_average'}).take.arm.percent)) + '%)'">
                                </v-badge>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
        </v-col>
        <v-col cols="12">
            <v-divider></v-divider>
        </v-col>
    </v-row>
</v-col>

<v-col cols="12">
<?php echo new Template('patients-management/view_tabs/vital_signs_parts/view-table') ?>   
</v-col>