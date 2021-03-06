<!-- START AFTER THIS-->
<v-main>
    <!-- Provides the application the proper gutter -->
    <v-container fluid white>
        <v-row>
            <?php echo new Template('parts/sidebar', $data) ?>
            <v-col cols="12" md="9" lg="10" class="pt-16 pl-md-8">
                <?php echo new Template('parts/upcm_logo') ?>
                <h2 class="mb-10">Historial de cambios</h2>
                <v-col cols="12" class="px-0" v-if="updates.length > 0">
                    <label>Buscar en el historial</label>
                    <v-text-field v-model="search" placeholder="Paciente, doctor" @input="filterUpdates" outlined>
                        <template #append>
                            <v-select v-model="search_by" class="p-0 m-0 mt-n1 mb-n4" label="Buscar por"
                                :items="['Doctor', 'Paciente']" @change="filterUpdates" outlined dense></v-select>
                        </template>
                    </v-text-field>
                </v-col>
                <div class="mt-5" v-for="update in updates_filtered">
                    <v-alert border="top" :color="getAlertClass(update.action_type)" colored-border elevation="2"
                        prominent>
                        <v-icon class="alert-avatar" v-if='update.avatar == null'>mdi-account-circle</v-icon>
                        <v-avatar class="mr-2" v-else>
                            <v-img :src="'<?php echo SITE_URL ?>/public/img/avatars/'+ update.avatar"></v-img>
                        </v-avatar>
                        {{ update.doctor_first_name }} {{ update.doctor_last_name }} {{ update.action }} <span
                            class="primary--text">({{ update.patient_first_name }}
                            {{ update.patient_last_name }})</span>
                        <div class="grey--text grey--lighten-1 subtitle-2 time-past">
                            {{ fromNow(update.registered_at) }}</div>
                    </v-alert>
                </div>
            </v-col>
        </v-row>
    </v-container>
</v-main>