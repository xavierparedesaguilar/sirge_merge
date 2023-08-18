<?php
$insitu = "/conservacion-in-situ/";

// CONOCIMIENTOS TRADICIONALES
$routes->connect($insitu . ':idx/conocimiento-tradicional', ['controller' => 'TbConocimientoTradicional', 'action' => 'index'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/conocimiento-tradicional/crear', ['controller' => 'TbConocimientoTradicional', 'action' => 'add'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/conocimiento-tradicional/ver/:id', ['controller' => 'TbConocimientoTradicional', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/conocimiento-tradicional/editar/:id', ['controller' => 'TbConocimientoTradicional', 'action' => 'edit'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/conocimiento-tradicional/eliminar/:id', ['controller' => 'TbConocimientoTradicional', 'action' => 'delete'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/conocimiento-tradicional/exportar', ['controller' => 'TbConocimientoTradicional', 'action' => 'exportartabla'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/conocimiento-tradicional/sector', ['controller' => 'TbConocimientoTradicional', 'action' => 'exportartabla']);

// COMUNIDAD
$routes->connect($insitu . ':idx/comunidad', ['controller' => 'TbComunidad', 'action' => 'index'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/comunidad/crear', ['controller' => 'TbComunidad', 'action' => 'add'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/comunidad/ver/:id', ['controller' => 'TbComunidad', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/comunidad/editar/:id', ['controller' => 'TbComunidad', 'action' => 'edit'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/comunidad/eliminar/:id', ['controller' => 'TbComunidad', 'action' => 'delete'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/comunidad/exportar', ['controller' => 'TbComunidad', 'action' => 'exportartabla'], ['pass' => ['idx']]);

// INICIO MODULO ZABD 
$routes->connect($insitu, ['controller' => 'Zabd', 'action' => 'index']);
$routes->connect($insitu . 'crear', ['controller' => 'Zabd', 'action' => 'add']);
$routes->connect($insitu . 'ver/:id', ['controller' => 'Zabd', 'action' => 'view'], ['pass' => ['id']]);
$routes->connect($insitu . 'editar/:id', ['controller' => 'Zabd', 'action' => 'edit'], ['pass' => ['id']]);
$routes->connect($insitu . 'eliminar/:id', ['controller' => 'Zabd', 'action' => 'delete'], ['pass' => ['id']]);
$routes->connect($insitu . 'exportar', ['controller' => 'Zabd', 'action' => 'exportartabla']);

// RECORRIDO 
$routes->connect($insitu . ':idx/Accesibilidad', ['controller' => 'TbRecorrido', 'action' => 'index'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/Accesibilidad/crear', ['controller' => 'TbRecorrido', 'action' => 'add'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/Accesibilidad/ver/:id', ['controller' => 'TbRecorrido', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/Accesibilidad/editar/:id', ['controller' => 'TbRecorrido', 'action' => 'edit'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/Accesibilidad/eliminar/:id', ['controller' => 'TbRecorrido', 'action' => 'delete'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/Accesibilidad/exportar', ['controller' => 'TbRecorrido', 'action' => 'exportartabla'], ['pass' => ['idx']]);

// Sector
$routes->connect($insitu . ':idx/sector',['controller' => 'TbSector', 'action' => 'index'],['pass'=>['idx']]);
$routes->connect($insitu . ':idx/sector/crear', ['controller' => 'TbSector', 'action' => 'add'],['pass'=>['idx']]);
$routes->connect($insitu . ':idx/sector/ver/:id', ['controller' => 'TbSector', 'action' => 'view'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/sector/editar/:id', ['controller' => 'TbSector', 'action' => 'edit'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/sector/eliminar/:id', ['controller' => 'TbSector', 'action' => 'delete'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/sector/exportar', ['controller' => 'TbSector', 'action' => 'exportartabla'], ['pass' => ['idx']]);
// Metodo
$routes->connect($insitu . ':idx/metodo',['controller' => 'TbMetodo', 'action' => 'index'],['pass'=>['idx']]);
$routes->connect($insitu . ':idx/metodo/crear', ['controller' => 'TbMetodo', 'action' => 'add'],['pass'=>['idx']]);
$routes->connect($insitu . ':idx/metodo/ver/:id', ['controller' => 'TbMetodo', 'action' => 'view'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/metodo/editar/:id', ['controller' => 'TbMetodo', 'action' => 'edit'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/metodo/eliminar/:id', ['controller' => 'TbMetodo', 'action' => 'delete'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/metodo/exportar', ['controller' => 'TbMetodo', 'action' => 'exportartabla'], ['pass' => ['idx']]);
// Conocimiento
$routes->connect($insitu . ':idx/conocimiento',['controller' => 'TbConocimiento', 'action' => 'index'],['pass'=>['idx']]);
$routes->connect($insitu . ':idx/conocimiento/crear', ['controller' => 'TbConocimiento', 'action' => 'add'],['pass'=>['idx']]);
$routes->connect($insitu . ':idx/conocimiento/ver/:id', ['controller' => 'TbConocimiento', 'action' => 'view'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/conocimiento/editar/:id', ['controller' => 'TbConocimiento', 'action' => 'edit'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/conocimiento/eliminar/:id', ['controller' => 'TbConocimiento', 'action' => 'delete'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/conocimiento/exportar', ['controller' => 'TbConocimiento', 'action' => 'exportartabla'], ['pass' => ['idx']]);

// TRAMITE DOCUMENTARIO
$routes->connect($insitu . ':idx/tramite-documentario', ['controller' => 'TbTramiteDocumentario', 'action' => 'index'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/tramite-documentario/crear', ['controller' => 'TbTramiteDocumentario', 'action' => 'add'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/tramite-documentario/ver/:id', ['controller' => 'TbTramiteDocumentario', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/tramite-documentario/editar/:id', ['controller' => 'TbTramiteDocumentario', 'action' => 'edit'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/tramite-documentario/eliminar/:id', ['controller' => 'TbTramiteDocumentario', 'action' => 'delete'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/tramite-documentario/exportar', ['controller' => 'TbTramiteDocumentario', 'action' => 'exportartabla'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/tramite-documentario/sector', ['controller' => 'TbTramiteDocumentario', 'action' => 'exportartabla']);
$routes->connect($insitu . ':idx/tramite-documentario/tipo_documento', ['controller' => 'TbTramiteDocumentario', 'action' => 'tipo_documento'],['pass' => ['idx']]);
// tipo de document
$routes->connect($insitu . ':idx/tipo-documento', ['controller' => 'TbTipoDocumento', 'action' => 'index'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/tipo-documento/crear', ['controller' => 'TbTipoDocumento', 'action' => 'add'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/tipo-documento/ver/:id', ['controller' => 'TbTipoDocumento', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/tipo-documento/editar/:id', ['controller' => 'TbTipoDocumento', 'action' => 'edit'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/tipo-documento/eliminar/:id', ['controller' => 'TbTipoDocumento', 'action' => 'delete'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/tipo-documento/exportar', ['controller' => 'TbTipoDocumento', 'action' => 'exportartabla'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/tramite-documentario/editar/:id', ['controller' => 'TbTramiteDocumentario', 'action' => 'edit'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/tramite-documentario/tipo_documento', ['controller' => 'TbTramiteDocumentario', 'action' => 'tipo_documento'],['pass' => ['idx']]);


// organizacion
$routes->connect($insitu . ':idx/organizacion', ['controller' => 'TbOrganizacion', 'action' => 'index'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/organizacion/crear', ['controller' => 'TbOrganizacion', 'action' => 'add'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/organizacion/ver/:id', ['controller' => 'TbOrganizacion', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/organizacion/editar/:id', ['controller' => 'TbOrganizacion', 'action' => 'edit'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/organizacion/eliminar/:id', ['controller' => 'TbOrganizacion', 'action' => 'delete'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/organizacion/exportar', ['controller' => 'TbOrganizacion', 'action' => 'exportartabla'], ['pass' => ['idx']]);
// PADRON DE COMUNEROS
$routes->connect($insitu . ':idx/padron', ['controller' => 'TbPadronComuneros', 'action' => 'index'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/padron/crear', ['controller' => 'TbPadronComuneros', 'action' => 'add'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/padron/ver/:id', ['controller' => 'TbPadronComuneros', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/padron/editar/:id', ['controller' => 'TbPadronComuneros', 'action' => 'edit'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/padron/eliminar/:id', ['controller' => 'TbPadronComuneros', 'action' => 'delete'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/padron/exportar', ['controller' => 'TbPadronComuneros', 'action' => 'exportartabla'], ['pass' => ['idx']]);
// centro poblado
$routes->connect($insitu . ':idx/comunidad/:id/centro-poblado/', ['controller' => 'TbCentroPoblado', 'action' => 'index'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/comunidad/:id/centro-poblado/crear', ['controller' => 'TbCentroPoblado', 'action' => 'add'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/comunidad/:id/centro-poblado/ver/:id', ['controller' => 'TbCentroPoblado', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/comunidad/:id/centro-poblado/editar/:idy', ['controller' => 'TbCentroPoblado', 'action' => 'edit'], ['pass' => ['idx', 'id','idy']]);
$routes->connect($insitu . ':idx/comunidad/:id/centro-poblado/eliminar/:idy', ['controller' => 'TbCentroPoblado', 'action' => 'delete'], ['pass' => ['idx', 'id', 'idy']]);
$routes->connect($insitu . ':idx/comunidad/:id/centro-poblado/exportar', ['controller' => 'TbCentroPoblado', 'action' => 'exportartabla'], ['pass' => ['idx']]);
// Cultivo
$routes->connect($insitu . ':idx/conocimiento-tradicional/:id/cultivo/', ['controller' => 'TbCultivo', 'action' => 'index'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/conocimiento-tradicional/:id/cultivo/crear', ['controller' => 'TbCultivo', 'action' => 'add'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/conocimiento-tradicional/:id/cultivo/ver/:id', ['controller' => 'TbCultivo', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/conocimiento-tradicional/:id/cultivo/editar/:idy', ['controller' => 'TbCultivo', 'action' => 'edit'], ['pass' => ['idx', 'id','idy']]);
$routes->connect($insitu . ':idx/conocimiento-tradicional/:id/cultivo/eliminar/:idy', ['controller' => 'TbCultivo', 'action' => 'delete'], ['pass' => ['idx', 'id', 'idy']]);
$routes->connect($insitu . ':idx/conocimiento-tradicional/:id/cultivo/exportar', ['controller' => 'TbCultivo', 'action' => 'exportartabla'], ['pass' => ['idx']]);
// Etapa
$routes->connect($insitu . ':idx/conocimiento-tradicional/:id/etapa/', ['controller' => 'TbEtapa', 'action' => 'index'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/conocimiento-tradicional/:id/etapa/crear', ['controller' => 'TbEtapa', 'action' => 'add'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/conocimiento-tradicional/:id/etapa/ver/:id', ['controller' => 'TbEtapa', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/conocimiento-tradicional/:id/etapa/editar/:idy', ['controller' => 'TbEtapa', 'action' => 'edit'], ['pass' => ['idx', 'id','idy']]);
$routes->connect($insitu . ':idx/conocimiento-tradicional/:id/etapa/eliminar/:idy', ['controller' => 'TbEtapa', 'action' => 'delete'], ['pass' => ['idx', 'id', 'idy']]);
$routes->connect($insitu . ':idx/conocimiento-tradicional/:id/etapa/exportar', ['controller' => 'TbEtapa', 'action' => 'exportartabla'], ['pass' => ['idx']]);

// DIVERSIDAD CULTIVO
$routes->connect($insitu . ':idx/diversidad-cultivo', ['controller' => 'TbDiversidadCultivos', 'action' => 'index'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/crear', ['controller' => 'TbDiversidadCultivos', 'action' => 'add'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/ver/:id', ['controller' => 'TbDiversidadCultivos', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/editar/:id', ['controller' => 'TbDiversidadCultivos', 'action' => 'edit'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/eliminar/:id', ['controller' => 'TbDiversidadCultivos', 'action' => 'delete'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/exportar', ['controller' => 'TbDiversidadCultivos', 'action' => 'exportartabla'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/sector', ['controller' => 'TbDiversidadCultivos', 'action' => 'exportartabla']);
// Variedades
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/variedades/', ['controller' => 'TbVariedades', 'action' => 'index'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/variedades/crear', ['controller' => 'TbVariedades', 'action' => 'add'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/variedades/ver/:id', ['controller' => 'TbVariedades', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/variedades/editar/:idy', ['controller' => 'TbVariedades', 'action' => 'edit'], ['pass' => ['idx', 'id','idy']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/variedades/eliminar/:idy', ['controller' => 'TbVariedades', 'action' => 'delete'], ['pass' => ['idx', 'id', 'idy']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/variedades/exportar', ['controller' => 'TbVariedades', 'action' => 'exportartabla'], ['pass' => ['idx']]);
// TbParientesSilvestres
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/parientes-silvestres/', ['controller' => 'TbParientesSilvestres', 'action' => 'index'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/parientes-silvestres/crear', ['controller' => 'TbParientesSilvestres', 'action' => 'add'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/parientes-silvestres/ver/:id', ['controller' => 'TbParientesSilvestres', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/parientes-silvestres/editar/:idy', ['controller' => 'TbParientesSilvestres', 'action' => 'edit'], ['pass' => ['idx', 'id','idy']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/parientes-silvestres/eliminar/:idy', ['controller' => 'TbParientesSilvestres', 'action' => 'delete'], ['pass' => ['idx', 'id', 'idy']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/parientes-silvestres/exportar', ['controller' => 'TbParientesSilvestres', 'action' => 'exportartabla'], ['pass' => ['idx']]);
// TbNombresComunes
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/nombre-comun/', ['controller' => 'TbNombresComunes', 'action' => 'index'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/nombre-comun/crear', ['controller' => 'TbNombresComunes', 'action' => 'add'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/nombre-comun/ver/:id', ['controller' => 'TbNombresComunes', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/nombre-comun/editar/:idy', ['controller' => 'TbNombresComunes', 'action' => 'edit'], ['pass' => ['idx', 'id','idy']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/nombre-comun/eliminar/:idy', ['controller' => 'TbNombresComunes', 'action' => 'delete'], ['pass' => ['idx', 'id', 'idy']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/nombre-comun/exportar', ['controller' => 'TbNombresComunes', 'action' => 'exportartabla'], ['pass' => ['idx']]);
// TbNombresCientificos
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/nombre-cientifico/', ['controller' => 'TbNombresCientificos', 'action' => 'index'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/nombre-cientifico/crear', ['controller' => 'TbNombresCientificos', 'action' => 'add'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/nombre-cientifico/ver/:id', ['controller' => 'TbNombresCientificos', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/nombre-cientifico/editar/:idy', ['controller' => 'TbNombresCientificos', 'action' => 'edit'], ['pass' => ['idx', 'id','idy']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/nombre-cientifico/eliminar/:idy', ['controller' => 'TbNombresCientificos', 'action' => 'delete'], ['pass' => ['idx', 'id', 'idy']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/nombre-cientifico/exportar', ['controller' => 'TbNombresCientificos', 'action' => 'exportartabla'], ['pass' => ['idx']]);
// TbFamilias
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/familias/', ['controller' => 'TbFamilias', 'action' => 'index'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/familias/crear', ['controller' => 'TbFamilias', 'action' => 'add'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/familias/ver/:id', ['controller' => 'TbFamilias', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/familias/editar/:idy', ['controller' => 'TbFamilias', 'action' => 'edit'], ['pass' => ['idx', 'id','idy']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/familias/eliminar/:idy', ['controller' => 'TbFamilias', 'action' => 'delete'], ['pass' => ['idx', 'id', 'idy']]);
$routes->connect($insitu . ':idx/diversidad-cultivo/:id/familias/exportar', ['controller' => 'TbFamilias', 'action' => 'exportartabla'], ['pass' => ['idx']]);

// TbNombresCientificos
$routes->connect($insitu . ':idx/diversidad/:id/nombres-cientificos/', ['controller' => 'TbNombresCientificos', 'action' => 'index'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/diversidad/:id/nombres-cientificos/crear', ['controller' => 'TbNombresCientificos', 'action' => 'add'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/diversidad/:id/nombres-cientificos/ver/:id', ['controller' => 'TbNombresCientificos', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/diversidad/:id/nombres-cientificos/editar/:idy', ['controller' => 'TbNombresCientificos', 'action' => 'edit'], ['pass' => ['idx', 'id','idy']]);
$routes->connect($insitu . ':idx/diversidad/:id/nombres-cientificos/eliminar/:idy', ['controller' => 'TbNombresCientificos', 'action' => 'delete'], ['pass' => ['idx', 'id', 'idy']]);
$routes->connect($insitu . ':idx/diversidad/:id/nombres-cientificos/exportar', ['controller' => 'TbNombresCientificos', 'action' => 'exportartabla'], ['pass' => ['idx']]);

// DIVERSIDAD CRIANZA
$routes->connect($insitu . ':idx/diversidad-crianza', ['controller' => 'TbDiversidadCrianzas', 'action' => 'index'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/diversidad-crianza/crear', ['controller' => 'TbDiversidadCrianzas', 'action' => 'add'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/diversidad-crianza/ver/:id', ['controller' => 'TbDiversidadCrianzas', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/diversidad-crianza/editar/:id', ['controller' => 'TbDiversidadCrianzas', 'action' => 'edit'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/diversidad-crianza/eliminar/:id', ['controller' => 'TbDiversidadCrianzas', 'action' => 'delete'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/diversidad-crianza/exportar', ['controller' => 'TbDiversidadCrianzas', 'action' => 'exportartabla'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/diversidad-crianza/sector', ['controller' => 'TbDiversidadCrianzas', 'action' => 'exportartabla']);

// DIVERSIDAD FAUNA
$routes->connect($insitu . ':idx/diversidad-fauna', ['controller' => 'TbDiversidadFauna', 'action' => 'index'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/diversidad-fauna/crear', ['controller' => 'TbDiversidadFauna', 'action' => 'add'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/diversidad-fauna/ver/:id', ['controller' => 'TbDiversidadFauna', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/diversidad-fauna/editar/:id', ['controller' => 'TbDiversidadFauna', 'action' => 'edit'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/diversidad-fauna/eliminar/:id', ['controller' => 'TbDiversidadFauna', 'action' => 'delete'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/diversidad-fauna/exportar', ['controller' => 'TbDiversidadFauna', 'action' => 'exportartabla'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/diversidad-fauna/sector', ['controller' => 'TbDiversidadFauna', 'action' => 'exportartabla']);
// clase
$routes->connect($insitu . ':idx/diversidad/:id/clase/', ['controller' => 'TbClase', 'action' => 'index'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/diversidad/:id/clase/crear', ['controller' => 'TbClase', 'action' => 'add'], ['pass' => ['idx','id']]);
$routes->connect($insitu . ':idx/diversidad/:id/clase/ver/:id', ['controller' => 'TbClase', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/diversidad/:id/clase/editar/:idy', ['controller' => 'TbClase', 'action' => 'edit'], ['pass' => ['idx', 'id','idy']]);
$routes->connect($insitu . ':idx/diversidad/:id/clase/eliminar/:idy', ['controller' => 'TbClase', 'action' => 'delete'], ['pass' => ['idx', 'id', 'idy']]);
$routes->connect($insitu . ':idx/diversidad/:id/clase/exportar', ['controller' => 'TbClase', 'action' => 'exportartabla'], ['pass' => ['idx']]);

// DIVERSIDAD FLORA
$routes->connect($insitu . ':idx/diversidad-flora', ['controller' => 'TbDiversidadFlora', 'action' => 'index'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/diversidad-flora/crear', ['controller' => 'TbDiversidadFlora', 'action' => 'add'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/diversidad-flora/ver/:id', ['controller' => 'TbDiversidadFlora', 'action' => 'view'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/diversidad-flora/editar/:id', ['controller' => 'TbDiversidadFlora', 'action' => 'edit'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/diversidad-flora/eliminar/:id', ['controller' => 'TbDiversidadFlora', 'action' => 'delete'], ['pass' => ['idx', 'id']]);
$routes->connect($insitu . ':idx/diversidad-flora/exportar', ['controller' => 'TbDiversidadFlora', 'action' => 'exportartabla'], ['pass' => ['idx']]);
$routes->connect($insitu . ':idx/diversidad-flora/sector', ['controller' => 'TbDiversidadFlora', 'action' => 'exportartabla']);
// $routes->connect($fito_state . ':idy/descriptor/:idx/estado', ['controller' => 'DescriptorStateFito', 'action' => 'index'], ['pass' => ['idy', 'idx']]);
// $routes->connect($fito_state . ':idy/descriptor/:idx/estado/ver/:id', ['controller' => 'DescriptorStateFito', 'action' => 'view'], ['pass' => ['idy', 'idx', 'id']]);



/************************************* FIN MODULO area **************************************/
// $routes->connect($Area, ['controller' => 'TbSector', 'action' => 'index']);
// $routes->connect($Area . 'crear', ['controller' => 'TbSector', 'action' => 'add']);
// $routes->connect($Area . 'ver/:id', ['controller' => 'TbSector', 'action' => 'view'], ['pass' => ['id']]);
// $routes->connect($Area . 'editar/:id', ['controller' => 'TbSector', 'action' => 'edit'], ['pass' => ['id']]);
// $routes->connect($Area . 'eliminar/:id', ['controller' => 'TbSector', 'action' => 'delete'], ['pass' => ['id']]);
// $routes->connect($Area . 'exportar', ['controller' => 'TbSector', 'action' => 'exportartabla']);

?>