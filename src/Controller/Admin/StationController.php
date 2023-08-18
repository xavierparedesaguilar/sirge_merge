<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use App\View\Helper\FunctionsHelper;
use Cake\ORM\TableRegistry;

use Cake\Datasource\ConnectionManager;
use PDO;


/**
 * Station Controller
 *
 * @property \App\Model\Table\StationTable $Station
 */
class StationController extends AppController
{

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->loadComponent('Csrf');
        $this->mod_parent = "Administración base de datos";
        $this->mod_padre = "Estación Experimental";
        $this->loadModel('Ubigeo');

        $this->loadModel('Module');
        $this->module = $this->Module->find()->where(['controller' => $this->name])->first();
        if(!empty($this->module))
          $this->permiso=$this->Functions->validarModulo($this->module->id);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        if($this->permiso['index']){

            $styles  = ['assets/css/dataTables.bootstrap', 'assets/css/select.bootstrap.min'];
            $scripts = ['assets/js/select2/select2', 'assets/js/datatable/jquery.dataTables.min',
                        'assets/js/datatable/dataTables.bootstrap.min',
                        'assets/js/datatable/dataTables.select.min'];

            $mod_padre = $this->mod_parent;
            $titulo = $this->mod_padre;
            $permiso= $this->permiso;

            $station = $this->Station->find()->contain(['Ubigeo', 'Country'])->where(['Station.status !=' => '0'])->order(['eea' => 'ASC']);

            $this->set(compact('station', 'mod_padre', 'titulo', 'styles', 'scripts','permiso'));
            $this->set('_serialize', ['station']);


        } else {

              $this->Flash->error(__('Operación denegada.'));
              return $this->redirect($this->Auth->redirectUrl());
       }
    }

    /**
     * View method
     *
     * @param string|null $id Station id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $station_count = $this->Station->find()->where(['Station.status !=' => '0','Station.id '=>$id])->count();

        if ($station_count>0) {

            $titulo = $this->mod_padre;
            $parent = $this->mod_parent;
            $permiso= $this->permiso;

            $station = $this->Station->get($id, [
                'contain' => ['Ubigeo', 'Country']
            ]);

            $this->set(compact('station', 'titulo', 'parent','permiso'));
            $this->set('_serialize', ['station']);

        }else{

            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $station = $this->Station->newEntity();

        if($this->permiso['add']){

            if ($this->request->is('post')) {

                try {

                    $data = $this->request->getData();
                    $data['status'] = '1';

                    $station = $this->Station->patchEntity($station, $data);

                    if ($this->Station->save($station)) {

                        $list_module = explode('/', $this->request->params['_matchedRoute']);

                        $user_id    = $this->Auth->User('id');
                        $module     = $list_module[(count($list_module)-2)];
                        $action     = $list_module[(count($list_module)-1)];
                        $station_id = $station->id;
                        $recurso_id = '4';

                        $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);

                        $this->Flash->success(__('Estación Experimental creado satisfactoriamente.'));

                        return $this->redirect(['action' => 'index']);
                    }

                    $this->Flash->error(__('Hubo inconvenientes al crear la estación experimental. Por favor, Otra vez intente.'));

                } catch (\Exception $e) {

                    $this->Flash->error(__('Hubo inconvenientes al crear la estación experimental. Por favor, Otra vez intente.'));
                    return $this->redirect(['action' => 'index']);
                }
            }

            $titulo = $this->mod_padre;
            $parent = $this->mod_parent;
            $scripts = ['assets/js/fileinput/fileinput.min','assets/packages/jqueryvalidation/dist/jquery.validate'];
            $ubigeo = $this->Station->Ubigeo->find('list');
            $countrys = $this->Station->Country->find('list', ['keyField' => 'id', 'valueFRield' => 'name']);
            $regiones = $this->Ubigeo->find('list', ['keyField' => 'cod_dep', 'valueField' => 'nombre'])->where(['cod_pro' => 0]);

            $this->set(compact('station', 'ubigeo', 'countrys', 'titulo', 'parent', 'regiones', 'scripts'));
            $this->set('_serialize', ['station', 'regiones']);

        } else {

            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Station id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        if($this->permiso['edit']){

            $station_count = $this->Station->find()->where(['Station.status !=' => '0','Station.id '=>$id])->count();

            if($station_count==NULL){

                            $this->Flash->error(__('Operación denegada.'));
                            return $this->redirect(['action' => 'index']);
            } else {

                $station = $this->Station->get($id, [
                    'contain' => ['Ubigeo']
                ]);

                if ($this->request->is(['patch', 'post', 'put'])) {

                    $station = $this->Station->patchEntity($station, $this->request->getData());

                    if ($this->Station->save($station)) {

                        $list_module = explode('/', $this->request->params['_matchedRoute']);

                        $user_id    = $this->Auth->User('id');
                        $module     = $list_module[(count($list_module)-3)];
                        $action     = $list_module[(count($list_module)-2)];
                        $station_id = $station->id;
                        $recurso_id = '4';

                        $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);

                        $this->Flash->success(__('Estación Experimental actualizado satisfactoriamente.'));

                        return $this->redirect(['action' => 'index']);
                    }

                    $this->Flash->error(__('Hubo inconvenientes al actualizar la estación experimental. Por favor, Otra vez intente.'));
                }

                $scripts = ['assets/js/fileinput/fileinput.min','assets/packages/jqueryvalidation/dist/jquery.validate'];

                $titulo = $this->mod_padre;
                $parent = $this->mod_parent;

                if($station->ubigeo_id != NULL || $station->ubigeo_id != ''){

                    $provincias = $this->Ubigeo->find('list', ['keyField'=>'cod_pro','valueField'=>'nombre'])->where(['cod_dep' => $station['ubigeo']['cod_dep'], 'cod_pro !=' => 0, 'cod_dis' => 0]);
                    $distritos  = $this->Ubigeo->find('list', ['keyField'=>'id','valueField'=>'nombre'])->where(['cod_dep' => $station['ubigeo']['cod_dep'], 'cod_pro' => $station['ubigeo']['cod_pro'], 'cod_dis !=' => 0]);

                } else {

                    $provincias = [];
                    $distritos  = [];
                }

                $regiones   = $this->Ubigeo->find('list', ['keyField'=>'cod_dep','valueField'=>'nombre'])->where(['cod_pro' => 0]);

                $countrys = $this->Station->Country->find('list', ['keyField' => 'id', 'valueField' => 'name']);

                $this->set(compact('station', 'ubigeo', 'countrys', 'titulo', 'parent', 'regiones', 'provincias', 'distritos', 'scripts'));
                $this->set('_serialize', ['station', 'regiones']);

            }

        } else {

            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index']);

        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Station id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        if($this->permiso['delete']){

            $station_count = $this->Station->find()->where(['Station.status '=>'1','Station.id'=>$id])->count();

            if($station_count>0){

                $this->request->is(['post', 'delete']);

                $station = $this->Station->find()->where(['Station.status !=' => '0','Station.id'=>$id])->first();
                if($station==NULL){

                    $this->Flash->error(__('Operación denegada.'));
                    return $this->redirect(['action' => 'index',$id]);

                }else{

                 $station['status'] = '0';

                    if ($this->Station->save($station)) {

                        $list_module = explode('/', $this->request->params['_matchedRoute']);

                        $user_id    = $this->Auth->User('id');
                        $module     = $list_module[(count($list_module)-3)];
                        $action     = $list_module[(count($list_module)-2)];
                        $station_id = $station->id;
                        $recurso_id = '4';

                        $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);

                        $this->Flash->success(__('Estación Experimental eliminado satisfactoriamente.'));

                    } else {

                        $this->Flash->error(__('Hubo inconvenientes al eliminar la estación experimental. Por favor, Otra vez intente.'));
                    }

                    return $this->redirect(['action' => 'index']);
                }

            } else {

                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index']);
            }

        } else {

            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index']);

        }
    }

    // public function exportartabla() {

    // //     if ($this->request->is('post')) {

    // //         $data = $this->request->getData();

    // //         $filePath = WWW_ROOT .'reportes/'.$data['filename'].'.xlsx';

    // //         if(file_exists($filePath)){

    // //             $this->response->file($filePath , array('download'=> true));

    // //             return $this->response;

    // //         } else {

    // //             $this->Flash->error(__('No existe el archivo.'));
    // //             return $this->redirect(['action' => 'index']);
    // //         }
    // //     }
    //  }

     public function exportartabla() {

        
       
        if ($this->request->is('post')) {
            $data = $this->request->getData();         		
			$conn = ConnectionManager::get('default');          

            ///*********************************
            $sql="SELECT
                    ST.ID AS 'N°',
                    UPPER(ST.EEA) AS 'ESTACION',
                    (SELECT NAME FROM COUNTRY WHERE (ID = ST.COUNTRY_ID)) AS 'PAIS',
                    (
                        SELECT NOMBRE FROM UBIGEO
                            WHERE 
                            COD_DEP = (SELECT COD_DEP FROM UBIGEO WHERE (ID = ST.UBIGEO_ID))
                            AND COD_PRO=0 
                            AND COD_DIS=0
                    ) AS 'DEPARTAMENTO',
                    (
                        SELECT NOMBRE FROM UBIGEO 
                        WHERE
                        COD_DEP = (SELECT COD_DEP FROM UBIGEO WHERE (ID = ST.UBIGEO_ID)) 
                        AND 
                        COD_PRO = (SELECT COD_PRO FROM UBIGEO WHERE (ID = ST.UBIGEO_ID))
                        AND
                            COD_DIS=0
                    ) AS 'PROVINCIA',
                    (SELECT NOMBRE FROM UBIGEO WHERE (ID=ST.UBIGEO_ID)) AS 'DISTRITO',
                    ST.COLLSITE AS 'UBICACIÓN',
                    ST.RESPONSIBLE AS 'RESPONSABLE',
                    ST.CELPHONE AS 'CELULAR',
                    ST.EMAIL AS 'EMAIL',
                    ST.TELEPHONE AS 'TELEFONO',
                    CASE ST.AVAILABILITY WHEN 1 THEN'SI' WHEN 2 THEN 'NO' END AS 'DISPONIBILIDAD'
                    FROM
                    STATION AS ST
                    WHERE ST.STATUS= 1
                    ORDER BY ST.EEA 

            
                  ";
            $stmtData = $conn->prepare($sql);
			$stmtData->execute();

            if( $stmtData->rowCount() >= 1){

                $libros = $stmtData->fetchAll(PDO::FETCH_ASSOC);
							 
				$filename = "ListadeEEA.xlsx"; 

                /************************************ CREACION DEL EXCEL ***********************************/
				$objPHPExcel = new \PHPExcel();
				$objPHPExcel->setActiveSheetIndex(0);
                              
                
				// Creación de las letras del abecedario
				for($i=65; $i<=90; $i++) {
					$letra[] = chr($i);
				}
				for($i=65; $i<=90; $i++) {
					$letra[] = 'A'.chr($i);
				}
				for($i=65; $i<=90; $i++) {
					$letra[] = 'B'.chr($i);
				}
				for($i=65; $i<=90; $i++) {
					$letra[] = 'C'.chr($i);
				}

                ############################################# css para los titulos ######################################
				$estiloTitle = array(
                    'font' => array(
                              'name'     => 'Arial Narrow',
                              'bold'     => true,
                              'italic'   => false,
                              'strike'   => false,
                              'size'     => 20,
                              'color' => array(
                                  'rgb' => '000000'
                              )
                      ),
                      /*'borders' => array(
                                  'allborders' => array(
                                    'style' => \PHPExcel_Style_Border::BORDER_THIN
                                  )
                              ),*/
                      'alignment' =>  array(
                        'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY,
                        'vertical'   => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                        'rotation'   => 0,
                        'wrap'       => TRUE
                      )
          );

          $estiloSubTitle = array(
              'font' => array(
                        'name'     => 'Arial Narrow',
                        'bold'     => true,
                        'italic'   => false,
                        'strike'   => false,
                        'size'     => 13,
                        'color' => array(
                            'rgb' => 'ffffff'
                        )
                ),
                'borders' => array(
                            'allborders' => array(
                              'style' => \PHPExcel_Style_Border::BORDER_THIN
                            )
                        ),
                'alignment' =>  array(
                  'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                  'vertical'   => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                  'rotation'   => 0,
                  'wrap'       => TRUE
                )
          );

          $estiloCabezera = array(
              'font' => array(
                        'name'     => 'Arial Narrow',
                        'bold'     => true,
                        'italic'   => false,
                        'strike'   => false,
                        'size'     => 9,
                        'color' => array(
                            'rgb' => '000000'
                        )
                ),
                'borders' => array(
                            'allborders' => array(
                              'style' => \PHPExcel_Style_Border::BORDER_THIN
                            )
                        ),
                'alignment' =>  array(
                  'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                  'vertical'   => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                  'rotation'   => 0,
                  'wrap'       => TRUE
                )
          );

          $estiloRegistros = array(
              'font' => array(
                        'name'     => 'Arial Narrow',
                        'bold'     => false,
                        'italic'   => false,
                        'strike'   => false,
                        'size'     => 10,
                        'color' => array(
                            'rgb' => '000000'
                        )
                ),
                'borders' => array(
                            'allborders' => array(
                              'style' => \PHPExcel_Style_Border::BORDER_THIN
                            )
                        ),
                'alignment' =>  array(
                  'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY,
                  'vertical'   => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                  'rotation'   => 0,
                  'wrap'       => TRUE
                )
          );

          ############################################# /css  para los titulos  #########################################
				
				/************** INICIO GENERACION DE LOS TITULOS *****************/
				$header =  array_keys($libros[0]); // array_keys($resultado[0]);
                 
                // Rename sheet
               $objPHPExcel->setActiveSheetIndex(0)->mergeCells("A1:L1");
               $objPHPExcel->setActiveSheetIndex(0)->setCellValue("A1", "LISTA DE ESTACIONES EXPERIMENTALES AGRARIAS - RRGG");
               //Subtitulos /// 
               $objPHPExcel->setActiveSheetIndex(0)->mergeCells("A2:L2");
               $objPHPExcel->setActiveSheetIndex(0)->setCellValue("A2", "INFORMACIÓN GENERAL");
               

                /** ALTURA DE LA FILA */
               $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);
               $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);
               $objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(25);

               /** PARA BLOQUEAR COLUMNAS Y FILAS */
               $objPHPExcel->getActiveSheet()->freezePaneByColumnAndRow(0,4);

               $t = 1;

               for($i=0; $i<count($header); $i++){
                   $objPHPExcel->setActiveSheetIndex(0)->setCellValue($letra[$t-1].'3', $header[$i]);
                   //$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($letra[$t-1])->setAutoSize(TRUE); 
                   $t++;
               }
    
               $objPHPExcel->getActiveSheet()->getStyle("A1:L1")->applyFromArray($estiloTitle);
               $objPHPExcel->getActiveSheet()->getStyle("A2:L2")->applyFromArray($estiloSubTitle);
               $objPHPExcel->getActiveSheet()->getStyle("A3:L3")->applyFromArray($estiloCabezera);

               $objPHPExcel->getActiveSheet()
                                        ->getStyle('A2:L2')
                                        ->getFill()
                                        ->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)
                                        ->getStartColor()
                                        ->setRGB('806000');
                $objPHPExcel->getActiveSheet()
                                        ->getStyle('A3:L3')                                  
                                        ->getFill()
                                        ->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)
                                        ->getStartColor()
                                        ->setRGB('FFF2CC');

            /************************* MOSTRAR FILTROS DE BUSQUEDA ***************************/
            $objPHPExcel->getActiveSheet()->setAutoFilter('A3:L3');

            /************************* ANCHO DE COLUMNAS ***************************/

            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(50);
            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
            $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);

            /************************* INICIO IMPRESION DEL CONTENIDO ***************************/
           
				$celda = 4;
				$cnt=1;     
                for($i=0; $i < count($libros); $i++){

					$content = array_values($libros[$i]);

					for($j = 0; $j<count($content); $j++){
                        $objPHPExcel->getActiveSheet()->getRowDimension($j+4)->setRowHeight(17);
                        $objPHPExcel->getActiveSheet()->getStyle($letra[$j].($celda), $cnt)->applyFromArray($estiloRegistros);

						if($j==0){
						$objPHPExcel->setActiveSheetIndex(0)->setCellValue($letra[$j].($celda), $cnt);
						$cnt++;}
						else{
                            
						$objPHPExcel->setActiveSheetIndex(0)->setCellValue($letra[$j].($celda), 
                        $content[$j]);}	
                        
                        
					}

					$celda ++;
				}
                /************** FIN   *****************/
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				
				header('Content-Disposition: attachment;filename='.$filename .' ');
				header('Cache-Control: max-age=0');
				$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
				$objWriter->save('php://output');
                exit;            
           }
        
        }

        /************** FIN   *****************/
		$handle = fopen("no_data.txt", "w");
		fwrite($handle, "Consulta sin resultados .....");
		fclose($handle);

		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename('no_data.txt'));
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize('no_data.txt'));
		readfile('no_data.txt');
		  
		exit;


    
    }

    

}