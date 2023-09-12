<?php
class blog_model extends CI_Model
{
    public function viewblogs()
    {
        $query = $this->db->get('blogs');
        return $query->result();
    }
    public function view_blog_by_id($blog_id)
    {
        $this->db->where('bid', $blog_id);
        $query = $this->db->get('blogs');
        return $query->row_array();
    }
    public function view_blog_by_uname($uname)
    {
        $this->db->where('uname', $uname);
        $query = $this->db->get('blogs');
        return $query->result();
    }
    public function delete_blog($bid)
    {
        $this->db->where('bid', $bid);
        return $this->db->delete('blogs');
    }
    public function edit_blog($bid, $up_data)
    {
        $this->db->where('bid', $bid);
        $this->db->update('blogs', $up_data);
    }
}
