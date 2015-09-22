<?php

class Find extends CWidget {

    public function run() {
        $cargo = new Cargo();
        $transport = new Transport();

        $this->render('find', array('cargo'=>$cargo, 'transport'=>$transport));
    }
}