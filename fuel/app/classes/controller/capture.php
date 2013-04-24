<?php
class Controller_Capture extends Controller_Template 
{

	public function action_index()
	{
		$data['captures'] = Model_Capture::find('all');
		$this->template->title = "Captures";
		$this->template->content = View::forge('capture/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('Capture');

		if ( ! $data['capture'] = Model_Capture::find($id))
		{
			Session::set_flash('error', 'Could not find capture #'.$id);
			Response::redirect('Capture');
		}

		$this->template->title = "Capture";
		$this->template->content = View::forge('capture/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Capture::validate('create');
			
			if ($val->run())
			{
				$capture = Model_Capture::forge(array(
					'email' => Input::post('email'),
					'mobile' => Input::post('mobile'),
					'name' => Input::post('name'),
				));

				if ($capture and $capture->save())
				{
					Session::set_flash('success', 'Added capture #'.$capture->id.'.');

					Response::redirect('capture');
				}

				else
				{
					Session::set_flash('error', 'Could not save capture.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Captures";
		$this->template->content = View::forge('capture/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Capture');

		if ( ! $capture = Model_Capture::find($id))
		{
			Session::set_flash('error', 'Could not find capture #'.$id);
			Response::redirect('Capture');
		}

		$val = Model_Capture::validate('edit');

		if ($val->run())
		{
			$capture->email = Input::post('email');
			$capture->mobile = Input::post('mobile');
			$capture->name = Input::post('name');

			if ($capture->save())
			{
				Session::set_flash('success', 'Updated capture #' . $id);

				Response::redirect('capture');
			}

			else
			{
				Session::set_flash('error', 'Could not update capture #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$capture->email = $val->validated('email');
				$capture->mobile = $val->validated('mobile');
				$capture->name = $val->validated('name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('capture', $capture, false);
		}

		$this->template->title = "Captures";
		$this->template->content = View::forge('capture/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('Capture');

		if ($capture = Model_Capture::find($id))
		{
			$capture->delete();

			Session::set_flash('success', 'Deleted capture #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete capture #'.$id);
		}

		Response::redirect('capture');

	}


}