<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('Group', 'Model');
/**
 * Dashboard Controller
 *
 * @property Dashboard $Dashboard
 */
class DashboardController extends AppController {
/**
 * isAuthorized Method
 * Allows Hippa access to dashboard
 * @return void
 */
    public function isAuthorized($user){
        $group = $this->Session->read('Auth.User.group_id');  // Test group role. Is admin?
        
        if ($this->action == 'training_setup' && $group != Group::ADMIN) {
        	return false;
        }

        if ($group == Group::MANAGER  || $group == Group::USER || $group == Group::PARTNER_ADMIN ){ // Allow managers, Users  to view dashboard
            return true;
        }

        return parent::isAuthorized($user);
    }
/**
 * Mark Complete method - Sets Risk Asessment to complete in the Clients Model
 *
 */
    public function mark_complete(){
        $completed = date('Y-m-d'); // Get DateTime
        $client = $this->Session->read('Auth.User.client_id');
        $clientName = $this->Session->read('Auth.User.Client.name');
        
        $this->loadModel('Client');
        $this->Client->id = $client;
        $this->render(false); // tell cake to not use a view

        $existing_completion_date = $this->Client->field('risk_assessment_status');
        
        if ($existing_completion_date != '') {
        	$this->Session->setFlash(__('Your Risk Assessment was already marked complete on ') . $existing_completion_date . '.');
			$this->redirect(array('action' => 'index'));
			return;
        }
        
        // Send Email
        $message = 'New Risk Assessment Completed by Client ' . $clientName . ' - Completed on ' . $completed;
        $email = new CakeEmail('hipaaMail');
        $email->to(Configure::read('App.adminEmailTo'))
            ->subject(Configure::read('Theme.ra_email_name') . ' Marked Complete by Client - ' . $clientName)
            ->send($message);

        if ($this->Client->saveField('risk_assessment_status', $completed)) {
            $this->Session->setFlash('Thanks! Your Risk Assessment has been marked complete.', 'default', array('class' => 'success message'));
            $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
        } else {
            $this->Session->setFlash(__('Sorry, Risk Assessment did not complete. Please, try again.'));
            $this->redirect(array('controller' => 'dashboard', 'action' => 'index'));
        }
    }


/**
 * index method
 *
 * @return void
 */
    public function initial() {
        $clientId = $this->Session->read('Auth.User.client_id');

        // Check if RA and Org are to be displayed
        $this->loadModel('Client');
        $displayRaOrg = $this->Client->find('first', array('conditions' => array(
            'Client.id' => $clientId),
            'fields' => 'Client.id, Client.display_ra_org',
            'recursive' => 0
        ));
        if(isset($displayRaOrg)){
            $this->set(compact('displayRaOrg'));
        }
        
        $partnerId = $this->Session->read('Auth.User.Client.partner_id');
        if(isset($partnerId) && ($partnerId != 0)){
            $this->loadModel('Partner');
            $partner = $this->Partner->find('first', array('conditions' => array(
                        'id' => $partnerId),
                        'fields' => 'Partner.name, Partner.link, Partner.logo, Partner.logo_dir', 
                        'recursive' => 0
                        ));
            $this->set(compact('partner'));
        }
        //$this->Dashboard->recursive = 0;
        //$this->set('dashboard', $this->paginate());
    }

/**
 * Lets Get Started Controller
 *
 * @return void
 */
    public function lets_get_started(){
        // Check if Client already has an existing Risk Assessment
        $clientId = $this->Session->read('Auth.User.client_id');
        $this->loadModel('RiskAssessment');
        $risk = $this->RiskAssessment->find('first', array('conditions' => array(
                'client_id' => $clientId),
                'fields' => 'RiskAssessment.id, RiskAssessment.client_id',
                'recursive' => 0
        ));
        // If Risk Assessment exists then set it
        if(isset($risk) && !empty($risk)){
            $this->set(compact('risk'));
        }

        // Check if Client already has an existing Org Profile
        $this->loadModel('OrganizationProfile');
        $org = $this->OrganizationProfile->find('first', array('conditions' => array(
                'client_id' => $clientId),
                'fields' => 'OrganizationProfile.id, OrganizationProfile.client_id',
                'recursive' => 0
        ));
        // If Org profile exists then set it
        if(isset($org) && !empty($org)){
            $this->set(compact('org'));
        }
    }
 
/**
 * index method
 *
 * @return void
 */
    public function index() {
        $acct = $this->Session->read('Auth.User.Client.account_type');  // Redireect Initial Clients to Dashboard
        $group = $this->Session->read('Auth.User.group_id');
		if ($group == Group::PARTNER_ADMIN) {
			$this->redirect(array('controller' => 'clients', 'action' => 'index'));
		}
        if($acct == 'Initial' && $group != Group::USER){
            $this->redirect(array('controller' => 'dashboard', 'action' => 'initial'));
        }

        // Get Client Id
        $clientId = $this->Session->read('Auth.User.client_id');
        
        // Check if RA and Org are to be displayed
        $this->loadModel('Client');
        $displayRaOrg = $this->Client->find('first', array('conditions' => array(
            'Client.id' => $clientId),
            'fields' => 'Client.id, Client.display_ra_org',
            'recursive' => 0
        ));
        if(isset($displayRaOrg)){
            $this->set(compact('displayRaOrg'));
        }

        $partnerId = $this->Session->read('Auth.User.Client.partner_id');
        if(isset($partnerId) && ($partnerId != 0)){
            $this->loadModel('Partner');
            $partner = $this->Partner->find('first', array('conditions' => array(
                        'id' => $partnerId),
                        'fields' => 'Partner.name, Partner.link, Partner.logo, Partner.logo_dir',
                        'recursive' => 0
                        ));
            $this->set(compact('partner'));
        }
        //$this->Dashboard->recursive = 0;
        //$this->set('dashboard', $this->paginate());
    }
/**
 * Policies_and_procedures method
 *
 * @return void
 */
    public function policies_and_procedures() {
        // $acct = $this->Session->read('Auth.User.Client.account_type');  // Redireect Initial Clients to Dashboard
        // if($acct == 'Initial'){
            // $this->redirect(array('controller' => 'dashboard', 'action' => 'initial'));
        // }
        //$this->Dashboard->recursive = 0;
        //$this->set('dashboard', $this->paginate());
    }

/**
 * Contracts_and_documents method
 *
 * @return void
 */
    public function contracts_and_documents() {
        // $acct = $this->Session->read('Auth.User.Client.account_type');  // Redireect Initial Clients to Dashboard
        // if($acct == 'Initial'){
            // $this->redirect(array('controller' => 'dashboard', 'action' => 'initial'));
        // }
        //$this->Dashboard->recursive = 0;
        //$this->set('dashboard', $this->paginate());
    }
/**
 * Track and Document method
 *
 * @return void
 */
    public function track_and_document() {
        // $acct = $this->Session->read('Auth.User.Client.account_type');  // Redireect Initial Clients to Dashboard
        // if($acct == 'Initial'){
            // $this->redirect(array('controller' => 'dashboard', 'action' => 'initial'));
        // }
        //$this->Dashboard->recursive = 0;
        //$this->set('dashboard', $this->paginate());
    }
/**
 * Social Center method
 *
 * @return void
 */
    public function social_center() {
        // $acct = $this->Session->read('Auth.User.Client.account_type');  // Redireect Initial Clients to Dashboard
        // if($acct == 'Initial'){
            // $this->redirect(array('controller' => 'dashboard', 'action' => 'initial'));
        // }
        //$this->Dashboard->recursive = 0;
        //$this->set('dashboard', $this->paginate());
    }
/**
 * Education Center method
 *
 * @return void
 */
    public function education_center() {
        // $acct = $this->Session->read('Auth.User.Client.account_type');  // Redireect Initial Clients to Dashboard
        // if($acct == 'Initial'){
            // $this->redirect(array('controller' => 'dashboard', 'action' => 'initial'));
        // }
        //$this->Dashboard->recursive = 0;
        //$this->set('dashboard', $this->paginate());
    }
/**
 * Information Center method
 *
 * @return void
 */
    public function information_center() {
        // $acct = $this->Session->read('Auth.User.Client.account_type');  // Redireect Initial Clients to Dashboard
        // if($acct == 'Initial'){
            // $this->redirect(array('controller' => 'dashboard', 'action' => 'initial'));
        // }
        //$this->Dashboard->recursive = 0;
        //$this->set('dashboard', $this->paginate());
    }
/**
 * SIRP method
 *
 * @return void
 */
    public function sirp() {
        // $acct = $this->Session->read('Auth.User.Client.account_type');  // Redireect Initial Clients to Dashboard
        // if($acct == 'Initial'){
            // $this->redirect(array('controller' => 'dashboard', 'action' => 'initial'));
        // }
        //$this->Dashboard->recursive = 0;
        //$this->set('dashboard', $this->paginate());
    }
/**
 * What can you do now  method
 *
 * @return void
 */
    public function about() {
        $about = $this->Dashboard->find('first', array('conditions' => array('Dashboard.name' => 'about')));
        $this->set(compact('about'));
        //$this->Dashboard->recursive = 0;
        //$this->set('dashboard', $this->paginate());
    }



/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
/*  public function view($id = null) {
        $this->Dashboard->id = $id;
        if (!$this->Dashboard->exists()) {
            throw new NotFoundException(__('Invalid dashboard'));
        }
        $this->set('dashboard', $this->Dashboard->read(null, $id));
    }*/

/**
 * add method
 *
 * @return void
 */
/*  public function add() {
        if ($this->request->is('post')) {
            $this->Dashboard->create();
            if ($this->Dashboard->save($this->request->data)) {
                $this->Session->setFlash('The dashboard has been saved', 'default', array('class' => 'success message'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The dashboard could not be saved. Please, try again.'));
            }
        }
    }*/

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        $this->Dashboard->id = $id;
        if (!$this->Dashboard->exists()) {
            throw new NotFoundException(__('Invalid dashboard'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Dashboard->save($this->request->data)) {
                $this->Session->setFlash('The dashboard has been saved', 'default', array('class' => 'success message'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The dashboard could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Dashboard->read(null, $id);
        }
    }

	public function training_setup() {
		if ($this->request->is('post')) {
			$this->loadModel('Setting');
			$settings = $this->request->data['Dashboard'];
			foreach ($settings as $key=>$value) {
				$setting = $this->Setting->find('first', array('conditions' => array('key' => $key)));
				$this->Setting->id = $setting['Setting']['id'];
				$this->Setting->save(array('value' => $value));
			}
			$this->Session->setFlash('Training settings saved', 'default', array('class' => 'success message'));
		}
		$this->loadModel('Client');
		$this->set('moodle_courses', $this->Client->getMoodleCourses());
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
/*  public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Dashboard->id = $id;
        if (!$this->Dashboard->exists()) {
            throw new NotFoundException(__('Invalid dashboard'));
        }
        if ($this->Dashboard->delete()) {
            $this->Session->setFlash(__('Dashboard deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Dashboard was not deleted'));
        $this->redirect(array('action' => 'index'));
    }*/

}