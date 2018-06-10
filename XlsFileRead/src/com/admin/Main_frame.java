package com.admin;
import java.awt.*;
import java.awt.List;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.image.BufferedImage;
import java.io.*;
import java.lang.reflect.Array;
import java.text.DecimalFormat;
import java.util.*;

import javax.swing.*;
import javax.swing.filechooser.FileNameExtensionFilter;

import org.apache.poi.hssf.usermodel.HSSFCell;
import org.apache.poi.hssf.usermodel.HSSFRow;
import org.apache.poi.hssf.usermodel.HSSFSheet;
import org.apache.poi.hssf.usermodel.HSSFWorkbook;

public class Main_frame extends JFrame{
	JPanel panel_main=new JPanel();
	JPanel panel_north=new JPanel();
	JPanel panel_center=new JPanel();
	JPanel panel_south=new JPanel();
	static JTextArea txt_output=new JTextArea(35,110);
	JLabel lbl_source=new JLabel("Source");
	JLabel lbl_destination=new JLabel("Destination");
	static JTextField txt_search=new JTextField(22);
	JButton btnSubmit=new JButton("Submit");
	JButton btn_upload=new JButton("Browse");
	GridBagConstraints c1=new GridBagConstraints();
	JScrollPane scroll_out=new JScrollPane(txt_output,JScrollPane.VERTICAL_SCROLLBAR_ALWAYS,JScrollPane.HORIZONTAL_SCROLLBAR_ALWAYS);
	static File file=null;
	JFileChooser chooser=new JFileChooser();

	ArrayList<String> list = new ArrayList<String>();
	
	DecimalFormat df=new DecimalFormat("#0.000");
	public Main_frame()
	{
		init();
		cmp();
		btnAction();
		setDefaultCloseOperation(EXIT_ON_CLOSE);
	}
	public static void readXLSFile() throws IOException
	{
		txt_output.removeAll();
		file=new File(txt_search.getText());
		InputStream ExcelFileToRead = new FileInputStream(file);
		HSSFWorkbook wb = new HSSFWorkbook(ExcelFileToRead);

		HSSFSheet sheet=wb.getSheetAt(0);
		HSSFRow row; 
		HSSFCell cell;
		
		

		Iterator rows = sheet.rowIterator();

		while (rows.hasNext())
		{
			row=(HSSFRow) rows.next();
			Iterator cells = row.cellIterator();
			
			
			while (cells.hasNext())
			{
				cell=(HSSFCell) cells.next();
		
				if (cell.getCellType() == HSSFCell.CELL_TYPE_STRING)
				{
					//System.out.print(cell.getStringCellValue()+" ");
					txt_output.append(cell.getStringCellValue()+",\t");
				}
				else if(cell.getCellType() == HSSFCell.CELL_TYPE_NUMERIC)
				{
					//System.out.print(cell.getNumericCellValue()+" ");
					txt_output.append(cell.getNumericCellValue()+",\t");
				}
				else
				{
					//U Can Handel Boolean, Formula, Errors
				}
			}
			System.out.println();
			txt_output.append("\n");
		}
	
	}
	public void btnAction()
	{
		btnSubmit.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent arg0) {
				if(!txt_search.getText().isEmpty()){
					txt_output.setText(null);
					try {
						readXLSFile();
					}
					catch (Exception e){
						JOptionPane.showMessageDialog(null, e);
						e.printStackTrace();
					}
				}
				else {
					JOptionPane.showMessageDialog(null, "Please Input Search Path");
				}
			}
		});
		btn_upload.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent arg0) {
				chooser.setDialogType(JFileChooser.OPEN_DIALOG);
				if(chooser.showDialog(panel_center, "Upload")!=JFileChooser.APPROVE_OPTION)
				{
					return;
				}
				txt_search.setText(chooser.getSelectedFile().getPath());
			}
		});
	}
	public void cmp()
	{
		add(panel_main);
		panel_main.setLayout(new BorderLayout());
		panel_main.add(panel_center,BorderLayout.CENTER);
		panel_main.add(panel_north,BorderLayout.NORTH);
		panel_main.add(panel_south,BorderLayout.SOUTH);
		panel_north_work();
		panel_center_work();
		panel_south_work();
	}
	private void panel_north_work() {
		panel_north.setLayout(new FlowLayout());
		panel_north.add(new JLabel("Path: "));
		panel_north.add(txt_search);
		panel_north.add(btn_upload);
		panel_north.add(btnSubmit);
		txt_search.setEditable(false);
	}
	private void panel_center_work() {
		panel_center.setLayout(new FlowLayout());
		panel_center.add(scroll_out);	
	}
	private void panel_south_work() {
		panel_south.setLayout(new FlowLayout());
		//panel_south.add(btnSubmit);
	}
	public void init()
	{
		setVisible(true);
		setSize(getToolkit().getDefaultToolkit().getScreenSize());
		setLocationRelativeTo(null);
		setDefaultCloseOperation(EXIT_ON_CLOSE);
		setTitle("XLS");
	}
}