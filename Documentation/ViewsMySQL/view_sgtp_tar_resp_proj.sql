SELECT
    t.`id` AS `taf_id`,
    p.`nome` AS `pro_nome`,
    tc.`created_by_name` AS `tc_created_by_name`,
    t.`nome` AS `taf_nome`,
    t.`data_inicio_real` AS `taf_data_inicio_real`,
    t.`data_fim_real` AS `taf_data_fim_real`,
    tc.`colaborador_id` AS `tc_colaborador_id`,
    t.`checklist` AS `taf_checklist`,
    t.`descricao` AS `taf_descricao`,
    t.`data_inicio_programado` AS `taf_data_inicio_programado`,
    t.`data_fim_programado` AS `taf_data_fim_programado`,
    tc.`id` AS `tc_id`,
    tc.`updated_by_name` AS `tc_updated_by_name`,
    tc.`tarefa_id` AS `tc_tarefa_id`,
    tc.`created_at` AS `tc_created_at`,
    tc.`updated_at` AS `tc_updated_at`,
    tc.`created_by` AS `tc_created_by`,
    tc.`updated_by` AS `tc_updated_by`,
    tc.`active` AS `tc_active`,
    tc.`deleted_at` AS `tc_deleted_at`,
    t.`projeto_id` AS `taf_projeto_id`,
    t.`tarefa_base_id` AS `taf_tarefa_base_id`,
    t.`tarefa_status_id` AS `taf_tarefa_status_id`,
    t.`dificuldade` AS `taf_dificuldade`,
    t.`thumbnail` AS `taf_thumbnail`,
    t.`observacoes` AS `taf_observacoes`,
    t.`coeficiente` AS `taf_coeficiente`,
    t.`interrompido_at` AS `taf_interrompido_at`,
    t.`interrompido_motivo` AS `taf_interrompido_motivo`,
    t.`order` AS `taf_order`,
    t.`tempo_determinado` AS `taf_tempo_determinado`,
    t.`created_at` AS `taf_created_at`,
    t.`updated_at` AS `taf_updated_at`,
    t.`created_by` AS `taf_created_by`,
    t.`created_by_name` AS `taf_created_by_name`,
    t.`updated_by` AS `taf_updated_by`,
    t.`updated_by_name` AS `taf_updated_by_name`,
    t.`active` AS `taf_active`,
    t.`deleted_at` AS `taf_deleted_at`,
    p.`id` AS `pro_id`,
    p.`cliente_id` AS `pro_cliente_id`,
    p.`projeto_status_id` AS `pro_projeto_status_id`,
    p.`projeto_fase_id` AS `pro_projeto_fase_id`,
    p.`observacoes` AS `pro_observacoes`,
    p.`descricao` AS `pro_descricao`,
    p.`sei` AS `pro_sei`,
    p.`hml_banco` AS `pro_hml_banco`,
    p.`hml_ip` AS `pro_hml_ip`,
    p.`prd_banco` AS `pro_prd_banco`,
    p.`prd_ip` AS `pro_prd_ip`,
    p.`hml_servidor` AS `pro_hml_servidor`,
    p.`repositorio` AS `pro_repositorio`,
    p.`created_at` AS `pro_created_at`,
    p.`updated_at` AS `pro_updated_at`,
    p.`created_by` AS `pro_created_by`,
    p.`created_by_name` AS `pro_created_by_name`,
    p.`updated_by` AS `pro_updated_by`,
    p.`updated_by_name` AS `pro_updated_by_name`,
    p.`active` AS `pro_active`,
    p.`deleted_at` AS `pro_deleted_at`
FROM
    `tarefa` t
    JOIN `projeto` p ON t.`projeto_id` = p.`id`
    LEFT JOIN `tarefa_colaborador` tc ON t.`id` = tc.`tarefa_id`
ORDER BY
    p.`nome`,
    tc.`created_by_name`,
    t.`data_inicio_real`;